<?php
require_once "base.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$email = $_POST['email'] ?? '';

$db = new Base();
$conn = $db->conectar();

$sql = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
$sql->execute([$email]);
$usuario = $sql->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    $_SESSION['error_recuperar'] = "El correo no está registrado.";
    header("Location: ../Estructura_UTrack/recuperar.php");
    exit;
}

// El correo existe → mandar a cambiar contraseña
$id = $usuario['id_usuario'];
header("Location: ../Estructura_UTrack/restablecer.php?uid=$id");
exit;
