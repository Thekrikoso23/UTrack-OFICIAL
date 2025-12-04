<?php
require_once "../php_UTrack/base.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: inicio.php');
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

$db = new Base();
$conn = $db->conectar();

$sql = $conn->prepare("SELECT nombre_usuario, email FROM usuarios WHERE id_usuario = ?");
$sql->execute([$id_usuario]);
$usuario = $sql->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <!-- 🔥 ESTO ES LO QUE FALTABA 🔥 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Perfil</title>
  <link rel="stylesheet" href="../Creacion_UTrack/inicio.css" />
</head>

<body>

  <main class="registro-main">
    <div class="registro-contenedor">
      
      <!-- Botón X -->
      <a href="perfil.php" class="cerrar-x">✖</a>

      <!-- Títulos -->
      <h1>Editar Perfil</h1>
      <h3>Modifica tu información</h3>

      <!-- Form con las mismas clases que registro -->
      <form class="registro-form" method="POST" action="../php_UTrack/actualizar_perfil.php">
        
        <label for="nombre">Nombre:</label>
        <input
          type="text"
          id="nombre"
          name="nombre"
          value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>"
          required
        />

        <label for="email">Correo:</label>
        <input
          type="email"
          id="email"
          name="email"
          value="<?= htmlspecialchars($usuario['email']) ?>"
          required
        />

        <label for="password">Nueva contraseña (opcional):</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Déjalo vacío si no deseas cambiarla"
        />

        <button type="submit">Guardar cambios</button>
      </form>

    </div>
  </main>

</body>
</html>
