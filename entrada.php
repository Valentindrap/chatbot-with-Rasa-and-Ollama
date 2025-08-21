<?php include("src/php/check_session.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gaucho AI - Entrada</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f0f0;
      padding: 40px;
    }
    h1 {
      text-align: center;
      color: #003366;
    }
    h2 {
      color: #2d8a70;
      margin-top: 40px;
    }
    .menu {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: 15px;
      margin-bottom: 30px;
    }
    .menu a {
      flex: 1 1 200px;
      padding: 12px;
      text-align: center;
      background: #3EB489;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background 0.3s;
    }
    .menu a:hover {
      background: #2d8a70;
    }
    /* 🔹 Botón de cerrar sesión */
    .logout {
      position: absolute;
      top: 20px;
      right: 20px;
    }
    .logout a {
      background: #cc3333;
      color: white;
      padding: 10px 15px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }
    .logout a:hover {
      background: #a00000;
    }
  </style>
</head>
<body>
  <!-- Botón logout -->
  <div class="logout">
    <a href="src/php/logout.php">Cerrar sesión</a>
  </div>

  <h1>Bienvenido a Gaucho AI</h1>

  <!-- Categoría -->
  <h2>Categorías</h2>
  <div class="menu">
    <a href="src/php/formAltaCategoria.php">Alta Categoría</a>
    <a href="src/php/formEditarCategoria.php">Editar Categoría</a>
    <a href="src/php/listarCategoria.php">Listar Categorías</a>
  </div>

  <!-- Usuario -->
  <h2>Usuarios</h2>
  <div class="menu">
    <a href="src/php/formAltaUsuario.php">Alta Usuario</a>
    <a href="src/php/formEditarUsuario.php">Editar Usuario</a>
    <a href="src/php/listarUsuario.php">Listar Usuarios</a>
  </div>

  <!-- Rol -->
  <h2>Roles</h2>
  <div class="menu">
    <a href="src/php/formAltaRol.php">Alta Rol</a>
    <a href="src/php/formEditarRol.php">Editar Rol</a>
    <a href="src/php/listarRol.php">Listar Roles</a>
  </div>

  <!-- Pregunta -->
  <h2>Preguntas</h2>
  <div class="menu">
    <a href="src/php/formAltaPregunta.php">Alta Pregunta</a>
    <a href="src/php/formEditarPregunta.php">Editar Pregunta</a>
    <a href="src/php/listarPregunta.php">Listar Preguntas</a>
  </div>

  <!-- Respuesta -->
  <h2>Respuestas</h2>
  <div class="menu">
    <a href="src/php/formAltaRespuesta.php">Alta Respuesta</a>
    <a href="src/php/formEditarRespuesta.php">Editar Respuesta</a>
    <a href="src/php/listarRespuesta.php">Listar Respuestas</a>
  </div>

</body>
</html>
