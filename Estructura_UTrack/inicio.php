<?php
require_once "../php_UTrack/base.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/inicio.css" />
</head>

<body>

  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo UTrack" class="logo">
      <nav class="navbar-links">
        <a class="active">UTrack</a>
      </nav>
      <div class="navbar-user">
        <img src="../Imagener_UTrack/Toros.png" alt="Los Toros" class="Toros">
      </div>
    </div>
  </header>

  <main class="registro-main">
    <div class="registro-contenedor">
      <h1>Bienvenido</h1>
      <h3>Inicia sesión</h3>

      <!-- FORMULARIO DE INICIO DE SESIÓN -->
      <form class="registro-form" method="POST" action="../php_UTrack/login.php">
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>

        <button type="submit">Iniciar Sesión</button>
      </form>

      <p class="texto-secundario">
        ¿No tienes cuenta?
        <br>
        Presiona aquí para registrarte
        <br>
        <!-- inicio.php y toros.php están en la misma carpeta -->
        <a href="toros.php" class="enlace-toros">TOROS</a>
      </p>

      <p class="texto-secundario">
        <!-- recuperar.php también está en la misma carpeta -->
        <a href="recuperar.php" class="enlace-olvido">
          ¿Olvidaste tu contraseña?
        </a>
      </p>
    </div>
  </main>
</body>
</html>
