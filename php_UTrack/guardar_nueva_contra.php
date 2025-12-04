<?php
require_once "base.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_usuario = $_POST['id_usuario'] ?? null;
$pass       = $_POST['password'] ?? '';

if (!$id_usuario || $pass == "") {
    $_SESSION['error_pass'] = "La contraseña no puede estar vacía.";
    header("Location: ../Estructura_UTrack/restablecer.php?uid=$id_usuario");
    exit;
}

$db = new Base();
$conn = $db->conectar();

$hash = password_hash($pass, PASSWORD_DEFAULT);

$sql = $conn->prepare("UPDATE usuarios SET password_hash = ? WHERE id_usuario = ?");
$sql->execute([$hash, $id_usuario]);

header("Location: ../Estructura_UTrack/inicio.php?recuperado=1");
exit;
