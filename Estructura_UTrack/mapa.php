<?php
require_once "../php_UTrack/base.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: inicio.php');
    exit;
}

$nombre_usuario = $_SESSION['usuario'];
$db = new Base();
$conn = $db->conectar();

$sql = "SELECT codigo, lat, lng FROM mapa_ubicaciones";
$stmt = $conn->prepare($sql);
$stmt->execute();

$ubicaciones = [];
while ($u = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $ubicaciones[$u["codigo"]] = $u["lat"] . "," . $u["lng"];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mapa - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/mapa.css">
</head>

<body>
  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" class="logo">

      <nav class="navbar-links">
        <a href="menu.php">UTrack</a>
        <a href="mapa.php" class="active">Mapa</a>
        <a href="comunidad.php">Comunidad</a>
        <a href="estrategias.php">Estrategias de Estudio</a>
      </nav>

      <div class="navbar-user">
        <a href="perfil.php">
          <img src="../Imagener_UTrack/Toros.png" class="Toros">
        </a>
      </div>
    </div>
  </header>

  <main class="mapa-main">
    <div class="mapa-layout">

      <div class="mapa-controles">
        <h3>Elegir edificio</h3>
        <select id="edificio-select">
          <option value="">-- Selecciona un edificio --</option>

          <?php foreach ($ubicaciones as $codigo => $coords): ?>
            <option value="<?= $codigo ?>"><?= "Edificio " . $codigo ?></option>
          <?php endforeach; ?>

        </select>
      </div>

      <div class="mapa-container">
        <iframe id="mapa-iframe"
          src="https://www.google.com/maps?q=31.5993314,-106.4084005&z=18&output=embed"
          allowfullscreen loading="lazy">
        </iframe>
      </div>

    </div>
  </main>

  <footer class="footer">
    <div class="footer-links">
      <a href="https://sise.utcj.edu.mx/">🌐 SISE UTCJ</a>
      <a href="https://facebook.com/SOYUTCJ">📘 Facebook</a>
      <a href="mailto:contacto@utrack.com">📧 Correo</a>
    </div>
  </footer>

  <script>
    const ubicaciones = <?= json_encode($ubicaciones, JSON_UNESCAPED_UNICODE) ?>;

    const iframe = document.getElementById("mapa-iframe");
    const select = document.getElementById("edificio-select");

    select.addEventListener("change", () => {
      const valor = select.value;
      if (ubicaciones[valor]) {
        iframe.src = `https://www.google.com/maps?q=${ubicaciones[valor]}&z=18&output=embed`;
      }
    });
  </script>
</body>
</html>
