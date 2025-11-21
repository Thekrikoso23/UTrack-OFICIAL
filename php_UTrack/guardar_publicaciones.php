<?php
require_once "base.php";

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: ../Estructura_UTrack/inicio.php");
    exit;
}

$id_usuario = $_SESSION["usuario_id"];

$id_ubicacion  = $_POST["id_ubicacion"] ?? "";
$titulo        = trim($_POST["titulo"] ?? "");
$descripcion   = trim($_POST["descripcion"] ?? "");

if ($id_ubicacion === "" || $titulo === "" || $descripcion === "") {
    echo "<script>alert('Todos los campos son obligatorios'); window.history.back();</script>";
    exit;
}

try {
    $db   = new Base();
    $conn = $db->conectar();

    $sql = "INSERT INTO publicaciones (id_usuario, id_ubicacion, titulo, descripcion, fecha_publicacion)
            VALUES (:usuario, :ubicacion, :titulo, :descripcion, NOW())";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(":usuario", $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(":ubicacion", $id_ubicacion, PDO::PARAM_INT);
    $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
    $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);

    $stmt->execute();

    header("Location: ../Estructura_UTrack/comunidad.php");
    exit;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
