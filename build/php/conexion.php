<?php 
// Definimos constantes para los parámetros de conexión a la base de datos.
define("SERVIDOR","localhost"); // El nombre del servidor o la dirección IP donde se aloja la base de datos.
define("USUARIO","root"); // El nombre de usuario para acceder a la base de datos.
define("PASSWORD",""); // La contraseña del usuario para la base de datos.
define("DB","chatbot_db"); // El nombre de la base de datos con la que se va a trabajar.

    try{
        // Intentamos establecer una conexión utilizando PDO (PHP Data Objects).
        // PDO es una interfaz que permite trabajar con bases de datos de manera segura y eficiente.
        
        $pdo = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . DB . ";charset=utf8", USUARIO, PASSWORD);
        // Aquí estamos creando una nueva instancia de PDO. Esta instancia representa la conexión a la base de datos.
        // La cadena de conexión tiene el siguiente formato: "mysql:host=SERVIDOR;dbname=DB;charset=utf8"
        // - mysql: es el tipo de base de datos (en este caso MySQL).
        // - host=SERVIDOR: especifica el servidor donde está alojada la base de datos, en este caso 'localhost' (el servidor local).
        // - dbname=DB: especifica el nombre de la base de datos a la que nos vamos a conectar, que es 'chatbot_db'.
        // - charset=utf8: especifica que queremos usar la codificación de caracteres UTF-8, para asegurar que los datos sean compatibles con caracteres especiales.

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Aquí estamos configurando PDO para que maneje los errores como excepciones. Esto significa que si ocurre un error de base de datos,
        // el script lanzará una excepción que podemos manejar con un bloque try-catch.
        
        //echo "Conexion exitosa"; // Si la conexión es exitosa, se muestra el mensaje "Conexion exitosa".
        
    }   catch(PDOException $e){
        // Si ocurre un error al intentar conectarse a la base de datos, se lanza una excepción.
        // El bloque 'catch' captura esa excepción y ejecuta el código dentro de él.
        
        echo "Error de conexion: " . $e->getMessage();
        // Aquí se captura el mensaje del error de la excepción y se muestra. El método 'getMessage()' devuelve el mensaje del error.
    }
?>
