<?php
require_once "../php_UTrack/base.php";

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
  <title>PROYECTO UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/mapa.css">
</head>


<body>
  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo de UTrack" class="logo">
      <nav class="navbar-links">
        <a href="../Estructura_UTrack/menu.php">UTrack</a>
        <a href="../Estructura_UTrack/mapa.php" class="active">Mapa</a>
        <a href="../Estructura_UTrack/comunidad.php">Comunidad</a>
        <a href="../Estructura_UTrack/estrategias.php">Estrategias de Estudio</a>
      </nav>
      <div class="navbar-user">
        <a href="../interaccion.html" title="Perfil">
          <img src="../Imagener_UTrack/Toros.png" alt="Los Toros" class="Toros">
        </a>
      </div>
    </div>
  </header>

  <aside class="sidebar">
    despliegues 
  </aside>

  <main class="mapa-main">
    <div class="mapa-layout">
      <!-- Panel izquierdo con el desplegable -->
      <div class="mapa-controles">
        <h3>Elegir edificio</h3>
        <select id="edificio-select">
          <option value="">-- Selecciona un edificio --</option>
          <option value="A">Edificio A </option>
          <option value="B">Edificio B </option>
          <option value="C">Edificio C </option>
          <option value="D">Edificio D </option>
          <option value="E">Edificio E </option>
          <option value="F">Edificio F </option>
          <option value="G">Edificio G </option>
          <option value="H">Edificio H </option>
          <option value="I">Edificio I </option>
          <option value="J">Edificio J </option>
          <option value="K">Edificio K </option>
          <option value="L">Edificio L </option>
          <option value="M">Edificio M </option>
          <option value="N">Edificio N </option>
          <option value="O">Edificio O </option>
        </select>
      </div>

      <!-- Panel derecho con el mapa -->
      <div class="mapa-container">
        <iframe
          id="mapa-iframe"
          src="https://www.google.com/maps?q=31.5993314,-106.4084005&z=18&output=embed"
          allowfullscreen
          loading="lazy">
        </iframe>
      </div>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-links">
      <a href="https://sise.utcj.edu.mx/" target="_blank" rel="noopener noreferrer">🌐 SISE UTCJ</a>
      <a href="https://www.facebook.com/SOYUTCJ" target="_blank" rel="noopener noreferrer">📘 Facebook</a>
      <a href="mailto:contacto@utrack.com">📧 Correo</a>
    </div>
  </footer>

  <!-- Script funcional para cambiar el mapa -->
  <script>
    const mapa = document.getElementById("mapa-iframe");
    const selector = document.getElementById("edificio-select");

    const ubicaciones = {
  A: "31.598750, -106.406167",
  B: "31.599083, -106.405583",
  C: "31.599444, -106.406167",
  D: "31.599194, -106.406889",
  E: "31.598694, -106.407000",
  F: "31.599222, -106.407528",
  G: "31.598860045103997, -106.40735302684972",
  H: "31.599472, -106.409194",
  I: "31.598972, -106.409361",
  J: "31.59927813810975, -106.40989771779844",
  K: "31.597500, -106.406556",
  L: "31.598150443909947, -106.40707142196607",
  M: "31.598583, -106.405417",
  N: "31.598167, -106.407667",
  O: "31.600389296290174, -106.40887851851099",
};


    selector.addEventListener("change", () => {
      const coord = ubicaciones[selector.value];
      if (coord) {
        mapa.src = `https://www.google.com/maps?q=${coord}&z=18&output=embed`;
      }
    });
  </script>
</body>
</html>
