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
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

$db = new Base();
$conn = $db->conectar();

// Nombre REAL de la columna de contraseña
$passwordCol = "password_hash";

// Si la contraseña viene vacía, no se actualiza
if ($password == "") {

    $sql = $conn->prepare("UPDATE usuarios SET nombre_usuario = ?, email = ? WHERE id_usuario = ?");
    $sql->execute([$nombre, $email, $id_usuario]);

} else {

    $passwordHASH = password_hash($password, PASSWORD_DEFAULT);

    $sql = $conn->prepare("UPDATE usuarios SET nombre_usuario = ?, email = ?, $passwordCol = ? WHERE id_usuario = ?");
    $sql->execute([$nombre, $email, $passwordHASH, $id_usuario]);
}

// Actualizar la sesión
$_SESSION['usuario'] = $nombre;

// Ruta CORRECTA a perfil.php
header("Location: ../Estructura_UTrack/perfil.php?mensaje=Perfil actualizado");
exit;
?>
