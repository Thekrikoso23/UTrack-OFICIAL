<?php
session_start();

$id_usuario = $_GET['uid'] ?? null;

if (!$id_usuario) {
    header("Location: inicio.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Restablecer contraseña</title>
  <link rel="stylesheet" href="../Creacion_UTrack/inicio.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<main class="registro-main">
  <div class="registro-contenedor">

    <a href="inicio.php" class="cerrar-x">✖</a>

    <h1>Restablecer contraseña</h1>
    <h3>Ingresa tu nueva contraseña</h3>

    <?php if (isset($_SESSION['error_pass'])): ?>
      <div class="alerta-error">
        <?= $_SESSION['error_pass']; ?>
      </div>
      <?php unset($_SESSION['error_pass']); ?>
    <?php endif; ?>

    <form class="registro-form" method="POST" action="../php_UTrack/guardar_nueva_contra.php">

      <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">

      <label for="password">Nueva contraseña:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Guardar contraseña</button>
    </form>

  </div>
</main>

</body>
</html>
