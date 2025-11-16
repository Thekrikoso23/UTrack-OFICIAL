<?php
require_once "../php_UTrack/base.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Estructura_UTrack/inicio.php');
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

$db = new Base();
$conn = $db->conectar();

// obtener datos del usuario
$query = "SELECT nombre_usuario, email, fecha_registro, ocupacion 
          FROM usuarios 
          WHERE id_usuario = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id", $id_usuario);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/perfil.css">
</head>

<body>

  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo UTrack" class="logo">
      <nav class="navbar-links">
        <a class="active">Perfil</a>
      </nav>

      <div class="navbar-user">
        <a href="../Estructura_UTrack/menu.php">
          <img src="../Imagener_UTrack/Toros.png" class="Toros">
        </a>
      </div>
    </div>
  </header>

  <main class="perfil-main">
    <div class="perfil-card">
      
      <h1 class="perfil-title">Bienvenido, <?php echo $usuario["nombre_usuario"]; ?></h1>
      <h3 class="perfil-subtitle">Tu información personal</h3>

      <div class="perfil-info">
        <label>Nombre:</label>
        <p><?php echo htmlspecialchars($usuario["nombre_usuario"]); ?></p>
      </div>

      <div class="perfil-info">
        <label>Correo:</label>
        <p><?php echo htmlspecialchars($usuario["email"]); ?></p>
      </div>

      <div class="perfil-info">
        <label>Rol:</label>
        <p><?php echo htmlspecialchars($usuario["ocupacion"]); ?></p>
      </div>

      <div class="perfil-info">
        <label>Miembro desde:</label>
        <p><?php echo htmlspecialchars($usuario["fecha_registro"]); ?></p>
      </div>

      <a href="../php_UTrack/logout.php" class="boton-salir">Cerrar sesión</a>

    </div>
  </main>

</body>
</html>
