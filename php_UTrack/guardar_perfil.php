<?php
require_once "base.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_usuario = $_POST["id_usuario"];
    $carrera = $_POST["carrera"];
    $semestre = $_POST["semestre"];

    $db = new Base();
    $conn = $db->conectar();

    // Insertar datos solo si no existen
    $sql = $conn->prepare("INSERT INTO perfil_usuario (id_usuario, carrera, semestre)
                           VALUES (:id_usuario, :carrera, :semestre)");

    $sql->bindParam(":id_usuario", $id_usuario);
    $sql->bindParam(":carrera", $carrera);
    $sql->bindParam(":semestre", $semestre);

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
