<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar contraseña</title>
  <link rel="stylesheet" href="../Creacion_UTrack/inicio.css">
</head>

<body>

<main class="registro-main">
  
  <div class="registro-contenedor">

    <a href="inicio.php" class="cerrar-x">✖</a>

    <h1>Recuperar contraseña</h1>
    <h3>Ingresa tu correo para continuar</h3>

    <?php if(isset($_SESSION['error_recuperar'])): ?>
      <div class="alerta-error">
        <?= $_SESSION['error_recuperar']; ?>
      </div>
      <?php unset($_SESSION['error_recuperar']); ?>
    <?php endif; ?>

    <form class="registro-form" method="POST" action="../php_UTrack/procesar_recuperacion.php">

      <label for="email">Correo:</label>
      <input type="email" id="email" name="email" required>

      <button type="submit">Enviar</button>

    </form>

  </div>

</main>

</body>
</html>
