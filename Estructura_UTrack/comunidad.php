<?php
require_once "../php_UTrack/base.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: inicio.php');
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$nombre_usuario = $_SESSION['usuario'];
$db = new Base();
$conn = $db->conectar();
$ubicSQL = $conn->prepare("SELECT id_ubicacion, codigo FROM mapa_ubicaciones");
$ubicSQL->execute();
$ubicaciones = $ubicSQL->fetchAll(PDO::FETCH_ASSOC);
$postSQL = $conn->prepare("
    SELECT p.*, m.codigo, u.nombre_usuario 
    FROM publicaciones p
    JOIN mapa_ubicaciones m ON p.id_ubicacion = m.id_ubicacion
    JOIN usuarios u ON p.id_usuario = u.id_usuario
    ORDER BY fecha_publicacion DESC
");
$postSQL->execute();
$posts = $postSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comunidad</title>
  <link rel="stylesheet" href="../Creacion_UTrack/comunidad.css">
</head>

<body>

<header class="navbar">
  <div class="navbar-content">
    <img src="../Imagener_UTrack/image.png" class="logo">

    <nav class="navbar-links">
      <a href="menu.php">UTrack</a>
      <a href="mapa.php">Mapa</a>
      <a href="comunidad.php" class="active">Comunidad</a>
      <a href="estrategias.php">Estrategias de Estudio</a>
    </nav>

    <a href="perfil.php"><img src="../Imagener_UTrack/Toros.png" class="Toros"></a>
  </div>
</header>

<main class="content">

  <h1>Comunidad UTrack</h1>
  <?php if (isset($_SESSION['mensaje'])): ?>
    <div style="background-color: #fdd; color: #a00; border: 1px solid #f00; padding: 10px; margin-bottom: 20px; border-radius: 8px; text-align: center;">
        <?= htmlspecialchars($_SESSION['mensaje']); ?>
    </div>
    <?php unset($_SESSION['mensaje']); ?>
  <?php endif; ?>
  <button onclick="toggleForm()" class="toggle-form-btn">Crear publicación</button>

  <div class="form-container" id="formContainer">
    <form class="post-form" method="POST" action="../php_UTrack/guardar_publicaciones.php">

      <label>Edificio:</label>
      <select name="id_ubicacion" required>
        <option value="">Selecciona un edificio</option>
        <?php foreach ($ubicaciones as $u): ?>
          <option value="<?= $u['id_ubicacion'] ?>">Edificio <?= $u['codigo'] ?></option>
        <?php endforeach; ?>
      </select>

      <label>Título:</label>
      <input type="text" name="titulo" required>

      <label>Descripción:</label>
      <textarea name="descripcion" rows="4" required></textarea>

      <button type="submit">Publicar</button>
    </form>
  </div>

  <section class="posts-section">
    
  <?php if (count($posts) === 0): ?>
    <p>No hay publicaciones aún. ¡Sé el primero!</p>
    <?php endif; ?>
    <?php foreach ($posts as $p): ?>
      <article class="post">
        
      <div class="post-header">
        <div class="post-meta-group">
          <div class="post-avatar">
            <?= strtoupper(substr($p["nombre_usuario"], 0, 1)) ?>
          </div>

          <div class="post-meta">
            <span class="name"><?= htmlspecialchars($p["nombre_usuario"]) ?></span>
            <span class="date"><?= $p["fecha_publicacion"] ?></span>
          </div>
        </div>

        <?php if ($p['id_usuario'] == $id_usuario): ?>
          <form method="POST" action="../php_UTrack/eliminar_publicacion.php" style="margin: 0;">
            <input type="hidden" name="id_publicacion" value="<?= $p['id_publicacion'] ?>">
            <button type="submit" class="delete-button">
              Eliminar
            </button>
          </form>
          <?php endif; ?>
        </div>

        <span class="post-badge">Edificio <?= $p["codigo"] ?></span>
        
        <h3><?= htmlspecialchars($p["titulo"]) ?></h3>

      

        <div class="post-divider"></div>

        <p class="post-content">
          <?= nl2br(htmlspecialchars($p["descripcion"])) ?>
        </p>
      </article>
      <?php endforeach; ?>
    
    </section>

</main>

 <footer class="footer">
        <div class="footer-links">
            <a href="https://sise.utcj.edu.mx/" target="_blank">🌐 SISE UTCJ</a>
            <a href="https://www.facebook.com/SOYUTCJ" target="_blank">📘 Facebook</a>
            <a href="mailto:contacto@utrack.com">📧 Correo</a>
        </div>
    </footer>

<script>
function toggleForm(){
  const form = document.getElementById("formContainer");
  form.style.display = (form.style.display === "block") ? "none" : "block";
}
</script>

</body>
</html>
