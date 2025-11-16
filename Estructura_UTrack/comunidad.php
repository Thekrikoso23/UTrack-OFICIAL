<?php
require_once "../php_UTrack/base.php";

if (!isset( $_SESSION["usuario_id"])) {
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
  <link rel="stylesheet" href="../Creacion_UTrack/comunidad.css">
</head>

<body>
  <!-- NAVBAR -->
  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo de UTrack" class="logo">
      <nav class="navbar-links">
        <a href="../Estructura_UTrack/menu.php">UTrack</a>
        <a href="../Estructura_UTrack/mapa.php">Mapa</a>
        <a href="../Estructura_UTrack/comunidad.php" class="active">Comunidad</a>
        <a href="../Estructura_UTrack/estrategias.php">Estrategias de Estudio</a>
      </nav>
      <div class="navbar-user">
        <a href="../Estructura_UTrack/perfil.php">
          <img src="../Imagener_UTrack/Toros.png" alt="Los Toros" class="Toros">
        </a>
      </div>
    </div>
  </header>

  <!-- MAIN -->
  <main class="content">

    <h1>Comunidad UTrack</h1>
    <p>Comparte tus experiencias, consejos o avisos con otros estudiantes y mentores.</p>

    <!-- Botón para desplegar el formulario -->
    <button class="toggle-form-btn" onclick="toggleForm()"> Crear nueva publicación</button>

    <!-- Formulario desplegable -->
    <div class="form-container" id="formContainer">
      <form class="post-form">
        <label>Elige edificio:</label>
        <select>
          <option value="">Selecciona un edificio</option>
          <option>Edificio A </option>
          <option>Edificio B </option>
          <option>Edificio C </option>
          <option>Edificio D </option>
          <option>Edificio E </option>
          <option>Edificio F </option>
          <option>Edificio G </option>
          <option>Edificio H </option>
          <option>Edificio I </option>
          <option>Edificio J </option>
          <option>Edificio K </option>
          <option>Edificio L </option>
          <option>Edificio M </option>
          <option>Edificio N </option>
          <option>Edificio O </option>
        </select>

        <label>Nombre del estudiante o profesor:</label>
        <input type="text" placeholder="Ej. María López">

        <label>Título o nombre del post:</label>
        <input type="text" placeholder="Ej. Reunión de mentoría">

        <label>Descripción:</label>
        <textarea rows="4"></textarea>

        <button type="submit" class="btn-publicar">Publicar</button>
      </form>
    </div>

    <!-- Publicaciones -->
    <section class="posts-section">
      <article class="post">
        <h3>📚 Tips de estudio para Ingeniería</h3>
        <p><strong>Publicado por:</strong> Ana Torres – 22/10/2025</p>
        <p>Si estás en los primeros cuatrimestres, te recomiendo repasar cálculo con los materiales que compartimos en la biblioteca del Edificio A.</p>
      </article>

      <article class="post">
        <h3>☕ Nueva cafetería en el campus</h3>
        <p><strong>Publicado por:</strong> Carlos Méndez – 21/10/2025</p>
        <p>¡Ya abrió la nueva cafetería junto al Edificio D! Tienen descuentos para estudiantes UTCJ con credencial vigente.</p>
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
