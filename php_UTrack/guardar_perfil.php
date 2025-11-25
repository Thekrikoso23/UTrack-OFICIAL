<?php
require_once "base.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_usuario = $_POST["id_usuario"];
    $carrera = $_POST["carrera"];
    $cuatrimestre = $_POST["cuatrimestre"];

    $db = new Base();
    $conn = $db->conectar();

    // Insertar datos solo si no existen
    $sql = $conn->prepare("INSERT INTO perfil_usuario (id_usuario, carrera, cuatrimestre)
                           VALUES (:id_usuario, :carrera, :cuatrimestre)");

    $sql->bindParam(":id_usuario", $id_usuario);
    $sql->bindParam(":carrera", $carrera);
    $sql->bindParam(":cuatrimestre", $cuatrimestre);

    if ($sql->execute()) {
        header("Location: ../Estructura_UTrack/perfil.php");
        exit;
    } else {
        echo "Error al guardar.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
