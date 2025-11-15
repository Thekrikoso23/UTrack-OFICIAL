<?php
require_once "../php_UTrack/base.php";

session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: menu.php'); 
    exit;
}

$nombre_usuario = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comunidad UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/interaccion.css">
</head>

<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo de UTrack" class="logo">
      <nav class="navbar-links">
        <a href="../Estructura_UTrack/menu.php"  class="active" >UTrack</a>
      </nav>
      <div class="navbar-user">
          <img src="../Imagener_UTrack/Toros.png" alt="Los Toros" class="Toros">
      </div>
    </div>
  </header>

  <!-- MAIN -->
  <main class="content">

    <h1>PERFIL DE USUARIO</h1>
    <p>Puedes visualizar todos tus datos y si quieres editarlos</p>
    <!-- Formulario desplegable -->
    

    <!-- Publicaciones -->
    <section class="posts-section">
            <article class="post">
                <h3>Nombre de usuario:
                <input type="text" placeholder="AdT23hd">
                </h3>
            </article>
            <article class="post">
                <h3>Contraseña:
                <input type="text" placeholder="AdT23hd">
                </h3>
            </article>
            <article class="post">
                <h3>Correo:
                <input type="text" placeholder="AdT23hd">
                </h3>
            </article>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-links">
      <a href="https://sise.utcj.edu.mx/" target="_blank">🌐 SISE UTCJ</a>
      <a href="https://www.facebook.com/SOYUTCJ" target="_blank">📘 Facebook</a>
      <a href="mailto:contacto@utrack.com">📧 Correo</a>
    </div>
  </footer>

  <!-- SCRIPT -->
  <script>
    function toggleForm() {
      const form = document.getElementById('formContainer');
      form.style.display = form.style.display === 'block' ? 'none' : 'block';
    }
  </script>

</body>
</html>
