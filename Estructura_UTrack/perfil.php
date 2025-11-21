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

$perSQL = $conn->prepare("SELECT carrera, semestre FROM perfil_usuario WHERE id_usuario = :id");
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

    <h1 class="perfil-title">Hola, <?= $usuario["nombre_usuario"] ?></h1>
    <h3 class="perfil-subtitle">Información personal</h3>

    <div class="perfil-info">
      <label>Nombre:</label>
      <p><?= $usuario["nombre_usuario"] ?></p>
    </div>

    <div class="perfil-info">
      <label>Correo:</label>
      <p><?= $usuario["email"] ?></p>
    </div>

    <div class="perfil-info">
      <label>Rol:</label>
      <p><?= $usuario["ocupacion"] ?></p>
    </div>

    <?php if ($perfil): ?>
      <div class="perfil-info">
        <label>Carrera:</label>
        <p><?= $perfil["carrera"] ?></p>
      </div>

      <div class="perfil-info">
        <label>Semestre:</label>
        <p><?= $perfil["semestre"] ?></p>
      </div>
    <?php else: ?>
      <p>No tienes información académica registrada aún.</p>
    <?php endif; ?>

    <a href="../php_UTrack/logout.php" class="boton-salir">Cerrar sesión</a>

  </div>

</main>

</body>
</html>
