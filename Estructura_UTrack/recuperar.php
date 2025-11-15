<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/recuperar.css" />
</head>

<body>
  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo UTrack" class="logo">
      <nav class="navbar-links">
        <a class="active" >UTrack</a>
        <a href=""> <?php echo $_SESSION['usuario']; ?></a>
      </nav>
      <div class="navbar-user">
        <img src="../Imagener_UTrack/Toros.png" alt="Usuario" class="Toros">
      </div>
    </div>
  </header>

  <main class="registro-main">
    <div class="registro-contenedor">
      <h1>Olvidaste la contraseña</h1>
      <h3>Ingresa tu correo</h3>

      <form class="registro-form">
        <label for="correo">Correo:</label>
        <input type="email" id="correo" placeholder="Ingresa tu correo"	required>

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
