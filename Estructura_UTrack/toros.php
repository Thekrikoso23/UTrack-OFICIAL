<?php
require_once "../php_UTrack/base.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/inicio.css" />
</head>

<body>
  <header>
  </header>

  <main class="registro-main">
    <div class="registro-contenedor">
      <a href="inicio.php" class="cerrar-x">✖</a>
      <h1>Bienvenido a la familia</h1>
      <h3>Regístrate</h3>

      <form class="registro-form" method="POST" action="../php_UTrack/registro.php">

        <label for="nombre_usuario">Nombre:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Ingresa tu nombre" required>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>

        <button type="submit">Registrarme</button>
      </form>


    </div>
  </main>
</body>
</html>
