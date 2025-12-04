<?php
require_once "../php_UTrack/base.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: inicio.php'); 
    exit;
}

$nombre_usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estrategias de Estudio - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/estrategias.css">
</head>

<body>

  <!-- NAVBAR -->
  <header class="navbar">
    <div class="navbar-content">

      <img src="../Imagener_UTrack/image.png" class="logo">

      <nav class="navbar-links">
        <a href="menu.php">UTrack</a>
        <a href="mapa.php">Mapa</a>
        <a href="comunidad.php">Comunidad</a>
        <a href="estrategias.php" class="active">Estrategias de Estudio</a>
      </nav>

      <div class="navbar-user">
        <a href="perfil.php">
          <img src="../Imagener_UTrack/Toros.png" class="Toros">
        </a>
      </div>

    </div>
  </header>

  <main class="content">
    <h1>🧭 GUÍA UNIVERSITARIA UTCJ</h1>

    <p>Ingresar a la Universidad Tecnológica de Ciudad Juárez (UTCJ) implica adaptarse a nuevos retos académicos, horarios
      y responsabilidades. Esta guía te ofrece estrategias para una adaptación exitosa a la vida universitaria.</p>

    <hr>

    <h4>1. Adaptación a los nuevos horarios</h4>
    <ul>
      <li>Establece una rutina diaria con horarios definidos.</li>
      <li>Usa una agenda o app para registrar clases y tareas.</li>
      <li>Aprovecha los espacios libres para repasar.</li>
    </ul>

    <h4>2. Cambios en la manera de estudiar</h4>
    <ul>
      <li>Revisa los temas antes de clase y toma apuntes claros.</li>
      <li>Dedica al menos una hora diaria al repaso.</li>
      <li>Forma grupos de estudio responsables.</li>
    </ul>

    <h4>3. Estrategias de organización</h4>
    <ul>
      <li>Divide tus metas grandes en tareas pequeñas.</li>
      <li>Usa la técnica Pomodoro para concentrarte.</li>
      <li>Revisa tus pendientes cada semana.</li>
    </ul>

    <h4>4. Relaciones universitarias</h4>
    <ul>
      <li>Mantén respeto y colaboración con tus compañeros.</li>
      <li>Participa en actividades extracurriculares.</li>
      <li>Rodéate de personas que te inspiren.</li>
    </ul>

    <h4>5. Bienestar emocional</h4>
    <ul>
      <li>Haz ejercicio y descansa lo suficiente.</li>
      <li>Tómate tiempo para ti y evita el exceso de café o desvelos.</li>
      <li>Busca apoyo psicológico si lo necesitas.</li>
    </ul>

    <h4>6. Uso responsable de la tecnología</h4>
    <ul>
      <li>Usa tus dispositivos como apoyo para el estudio.</li>
      <li>Organiza tus carpetas digitales por materia.</li>
      <li>Evita el plagio: cita siempre tus fuentes.</li>
    </ul>

    <h4>Conclusión</h4>
    <p>Adaptarte a la universidad lleva tiempo, pero cada paso es crecimiento. Sé constante, organizado y equilibrado.
      La clave del éxito está en la disciplina y la constancia.</p>
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
