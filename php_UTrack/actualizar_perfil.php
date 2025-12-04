<?php
require_once "base.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Estructura_UTrack/inicio.php');
    exit;
}

$id_usuario = $_SESSION['usuario_id'];
$nombre     = $_POST['nombre']  ?? '';
$email      = $_POST['email']   ?? '';
$password   = $_POST['password'] ?? '';

$db   = new Base();
$conn = $db->conectar();

/* 1) Verificar si el correo ya está usado por otro usuario */
$check = $conn->prepare("
    SELECT COUNT(*) 
    FROM usuarios 
    WHERE email = ? AND id_usuario != ?
");
$check->execute([$email, $id_usuario]);
$existeCorreo = $check->fetchColumn();

if ($existeCorreo > 0) {
    // Mandar error y regresar a editar_perfil
    header("Location: ../Estructura_UTrack/editar_perfil.php?error=correo");
    exit;
}

/* 2) Actualizar datos */
$passwordCol = "password_hash";

if ($password === "") {

    // Sin cambiar contraseña
    $sql = $conn->prepare("
        UPDATE usuarios 
        SET nombre_usuario = ?, email = ?
        WHERE id_usuario = ?
    ");
    $sql->execute([$nombre, $email, $id_usuario]);

} else {

    // Cambiar contraseña también
    $passwordHASH = password_hash($password, PASSWORD_DEFAULT);

    $sql = $conn->prepare("
        UPDATE usuarios 
        SET nombre_usuario = ?, email = ?, $passwordCol = ?
        WHERE id_usuario = ?
    ");
    $sql->execute([$nombre, $email, $passwordHASH, $id_usuario]);
}

$_SESSION['usuario'] = $nombre;

// Mensaje de éxito
header("Location: ../Estructura_UTrack/editar_perfil.php?success=1");
exit;
