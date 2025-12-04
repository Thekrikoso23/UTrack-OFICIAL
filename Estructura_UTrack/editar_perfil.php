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
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../Creacion_UTrack/editarperfil.css">
</head>

<body>

<div class="editar-main">

    <div class="editar-card">

        <!-- Botón regresar -->
        <a href="perfil.php" class="cerrar-x">✖</a>

        <h2 class="editar-title">Editar Perfil</h2>
        <p class="editar-subtitle">Modifica tu información</p>

        <form method="POST" action="../php_UTrack/actualizar_perfil.php">

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre_usuario']) ?>" required>

            <label>Correo:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

            <label>Nueva contraseña (opcional):</label>
            <input type="password" name="password" placeholder="Déjalo vacío si no deseas cambiarla">

            <button type="submit" class="boton-guardar">Guardar cambios</button>
        </form>

    </div>
</div>

</body>
</html>
