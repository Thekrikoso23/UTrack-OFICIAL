<?php
require_once "../php_UTrack/base.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Estructura_UTrack/inicio.php');
    exit;
}

$nombre_usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perfil - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/perfil.css" />
</head>

<body>
  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo UTrack" class="logo">
      <nav class="navbar-links">
        <a class="active">UTrack</a>
      </nav>
      <div class="navbar-user">
        <img src="../Imagener_UTrack/Toros.png" alt="Usuario" class="Toros">
      </div>
    </div>
  </header>

  <main class="perfil-main">
    <div class="perfil-contenedor">
      <h1>Bienvenido, <?php echo $nombre_usuario; ?></h1>
      <p>Este es tu perfil dentro del sistema UTrack.</p>

      <a href="../php_UTrack/logout.php" class="boton-salir">Cerrar sesión</a>
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
