<?php
require_once "base.php";

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Estructura_UTrack/inicio.php');
    exit;
}

$id_usuario_sesion = $_SESSION['usuario_id'];

if (!isset($_POST['id_publicacion']) || empty($_POST['id_publicacion'])) {
    header('Location: ../Estructura_UTrack/comunidad.php');
    exit;
}

$id_publicacion = filter_var($_POST['id_publicacion'], FILTER_SANITIZE_NUMBER_INT);

$db = new Base();
$conn = $db->conectar();

try {
    $checkSQL = $conn->prepare("SELECT id_usuario FROM publicaciones WHERE id_publicacion = :id_pub");
    $checkSQL->bindParam(':id_pub', $id_publicacion, PDO::PARAM_INT);
    $checkSQL->execute();
    $post = $checkSQL->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        $_SESSION['mensaje'] = "Error: La publicación no existe.";
        header('Location: ../Estructura_UTrack/comunidad.php');
        exit;
    }

    if ($post['id_usuario'] != $id_usuario_sesion) {
        $_SESSION['mensaje'] = "Error: No tienes permiso para eliminar esta publicación.";
        header('Location: ../Estructura_UTrack/comunidad.php');
        exit;
    }

    $deleteSQL = $conn->prepare("DELETE FROM publicaciones WHERE id_publicacion = :id_pub AND id_usuario = :id_user");
    $deleteSQL->bindParam(':id_pub', $id_publicacion, PDO::PARAM_INT);
    $deleteSQL->bindParam(':id_user', $id_usuario_sesion, PDO::PARAM_INT);
    
    if ($deleteSQL->execute()) {
        $_SESSION['mensaje'] = "Publicación eliminada con éxito.";
    } else {
        $_SESSION['mensaje'] = "Error al intentar eliminar la publicación.";
    }

} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error de base de datos: " . $e->getMessage();
}

header('Location: ../Estructura_UTrack/comunidad.php');
exit;
?>