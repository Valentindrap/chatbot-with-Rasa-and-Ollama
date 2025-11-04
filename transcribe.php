<?php
// transcribe.php
header('Content-Type: application/json; charset=utf-8');

// --- CONFIG: ajustá estas variables ---
define('DB_HOST', '127.0.0.1');   // usa 127.0.0.1 en vez de 'localhost' o 'localhots'
define('DB_NAME', 'chatbot_22');
define('DB_USER', 'root');
define('DB_PASS', ''); // <- tu password si corresponde
define('RASA_URL', 'http://192.168.0.107:5005/webhooks/rest/webhook');
// ------------------------------------------------

// CORS (solo para dev; en producción restringir origenes)
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
}
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

try {
    $text = isset($_POST['text']) ? trim($_POST['text']) : null;
    $sender = isset($_POST['sender']) ? trim($_POST['sender']) : 'web_user';

    if (!$text) {
        echo json_encode(['success' => false, 'error' => 'No text provided']);
        exit;
    }

    // Conexión DB (PDO)
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    // Insert inicial (guardamos user_text)
    $stmt = $pdo->prepare("INSERT INTO transcripts (sender_id, user_text, created_at) VALUES (:sender, :text, :created)");
    $stmt->execute([
        ':sender' => $sender,
        ':text' => $text,
        ':created' => time()
    ]);
    $insertId = $pdo->lastInsertId();

    // Enviar a Rasa (POST)
    $payload = json_encode(['sender' => $sender, 'message' => $text]);
    $ch = curl_init(RASA_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $resp = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlErr = null;
    if (curl_errno($ch)) {
        $curlErr = curl_error($ch);
    }
    curl_close($ch);

    $rasaResp = null;
    $bot_text_concat = '';

    if ($curlErr) {
        error_log("Curl error calling Rasa: $curlErr");
        $rasaResp = [['recipient_id' => $sender, 'text' => 'Error: no se pudo conectar con Rasa (curl)']];
        $bot_text_concat = 'Curl error: ' . $curlErr;
    } else if ($httpCode >= 200 && $httpCode < 300 && $resp) {
        $rasaResp = json_decode($resp, true);
        if (is_array($rasaResp)) {
            $parts = [];
            foreach ($rasaResp as $m) {
                if (isset($m['text'])) $parts[] = $m['text'];
                elseif (isset($m['image'])) $parts[] = '[IMAGEN]';
            }
            $bot_text_concat = implode("\n", $parts);
        } else {
            $bot_text_concat = is_string($resp) ? $resp : json_encode($resp);
        }
    } else {
        error_log("Rasa HTTP $httpCode - resp: " . substr($resp ?? '', 0, 300));
        $rasaResp = [['recipient_id' => $sender, 'text' => 'Error: Rasa devolvió estado ' . $httpCode]];
        $bot_text_concat = 'Rasa HTTP ' . $httpCode;
    }

    // Actualizar row con bot_text
    try {
        $upd = $pdo->prepare("UPDATE transcripts SET bot_text = :bot WHERE id = :id");
        $upd->execute([':bot' => $bot_text_concat, ':id' => $insertId]);
    } catch (Exception $e) {
        error_log("DB update error: " . $e->getMessage());
    }

    // Responder al frontend
    echo json_encode(['success' => true, 'rasa' => $rasaResp, 'bot_text' => $bot_text_concat]);

} catch (PDOException $pdoEx) {
    error_log("DB error: " . $pdoEx->getMessage());
    echo json_encode(['success' => false, 'error' => 'DB error: ' . $pdoEx->getMessage()]);
} catch (Exception $ex) {
    error_log("transcribe.php exception: " . $ex->getMessage());
    echo json_encode(['success' => false, 'error' => $ex->getMessage()]);
}
