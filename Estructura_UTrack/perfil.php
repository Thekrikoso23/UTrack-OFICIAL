<?php
require_once "../php_UTrack/base.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: inicio.php');
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$db = new Base();
$conn = $db->conectar();
$usrSQL = $conn->prepare("SELECT * FROM usuarios WHERE id_usuario = :id");
$usrSQL->bindParam(":id", $id_usuario);
$usrSQL->execute();
$usuario = $usrSQL->fetch(PDO::FETCH_ASSOC);
$perSQL = $conn->prepare("SELECT carrera, cuatrimestre FROM perfil_usuario WHERE id_usuario = :id");
$perSQL->bindParam(":id", $id_usuario);
$perSQL->execute();
$perfil = $perSQL->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="../Creacion_UTrack/perfil.css">
</head>

<body>

<header class="navbar">
  <div class="navbar-content">
    <img src="../Imagener_UTrack/image.png" class="logo">
    <nav class="navbar-links"><a class="active">Perfil</a></nav>

    <a href="menu.php">
      <img src="../Imagener_UTrack/Toros.png" class="Toros">
    </a>
  </div>
</header>

<main class="perfil-main">

  <div class="perfil-card">

    <h1 class="perfil-title">Hola, <?= htmlspecialchars($usuario["nombre_usuario"]) ?></h1>
    <h3 class="perfil-subtitle">Información personal</h3>

    <div class="perfil-info">
      <label>Nombre:</label>
      <p><?= htmlspecialchars($usuario["nombre_usuario"]) ?></p>
    </div>

    <div class="perfil-info">
      <label>Correo:</label>
      <p><?= htmlspecialchars($usuario["email"]) ?></p>
    </div>

    <div class="perfil-info">
      <label>Rol:</label>
      <p><?= htmlspecialchars($usuario["ocupacion"]) ?></p>
    </div>

    <!-- INFORMACIÓN ACADÉMICA -->
    <?php if ($perfil): ?>
      <div class="perfil-info">
        <label>Carrera:</label>
        <p><?= htmlspecialchars($perfil["carrera"]) ?></p>
      </div>

      <div class="perfil-info">
        <label>Cuatrimestre:</label>
        <p><?= htmlspecialchars($perfil["cuatrimestre"]) ?></p>
      </div>

    <?php else: ?>
      <form action="../php_UTrack/guardar_perfil.php" method="POST" class="perfil-form">

    <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">

    <div class="perfil-info">
      <label for="carrera">Carrera:</label>
      <select name="carrera" required>
        <option value="">Selecciona tu carrera</option>
        <option>Contaduría</option>
        <option>Desarrollo de Negocios</option>
        <option>Mantenimiento Industrial</option>
        <option>Nanotecnología</option>
        <option>Tecnologías de la Información</option>
        <option>Procesos Industriales</option>
        <option>Energías Renovables</option>
        <option>Mecatrónica</option>
        <option>Protección Civil</option>
        <option>Terapia Física</option>
      </select>
    </div>

    <div class="perfil-info">
      <label for="cuatrimestre">Cuatrimestre:</label>
      <select name="cuatrimestre" required>
        <option value="">Selecciona tu cuatrimestre</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6 (Estadia)</option>
      </select>
    </div>

    <button type="submit" class="boton-guardar">Guardar información</button>


    <br>

  </form>
    <?php endif; ?>

    <a href="../php_UTrack/logout.php" class="boton-salir">Cerrar sesión</a>
    <a class="boton-guardar" href="editar_perfil.php">Editar perfil</a>

  </div>

</main>

</body>
</html>
