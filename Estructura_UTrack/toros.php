<?php
require_once "../php_UTrack/base.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/inicio.css" />
</head>

<body>
  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo UTrack" class="logo">
      <nav class="navbar-links">
        <span class="logo-contenedor">
        <a class="active">UTrack</a>
        </span>
      </nav>
      
      <div class="navbar-user">
        <img src="../Imagener_UTrack/Toros.png" alt="Usuario" class="Toros">
      </div>
    </div>
  </header>

  <main class="registro-main">
    <div class="registro-contenedor">
      <h1>Bienvenido a la familia</h1>
      <h3>Regístrate</h3>

      <form class="registro-form" method="POST" action="../php_UTrack/registro.php">

        <label for="nombre_usuario">Nombre:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Ingresa tu nombre" required>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>

        <button type="submit">Registrarme</button>
      </form>


    </div>
  </main>

  <footer class="footer">
    <div class="footer-links">
      <a href="https://sise.utcj.edu.mx/" target="_blank">🌐 SISE UTCJ</a>
      <a href="https://www.facebook.com/SOYUTCJ" target="_blank">📘 Facebook</a>
      <a href="mailto:contacto@utrack.com">📧 Correo</a>
    </div>
  </footer>
</body>
</html>
