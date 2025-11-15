<?php
session_start();
require_once "base.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = $_POST["nombre_usuario"] ?? "NuevoUsuario";
    $email = $_POST["correo"] ?? "";
    $password = $_POST["password"] ?? "";

    if (empty($email) || empty($password)) {
        echo "<script>alert('Completa todos los campos'); window.history.back();</script>";
        exit;
    }

    try {
        $db = new Base();
        $conn = $db->conectar();

        // Validar si ya existe
        $check = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
        $check->bindParam(":email", $email);
        $check->execute();

        if ($check->rowCount() > 0) {
            echo "<script>alert('Este correo ya está registrado'); window.history.back();</script>";
            exit;
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO usuarios (nombre_usuario, email, password_hash, fecha_registro, ocupacion)
                  VALUES (:nombre, :email, :password, NOW(), 'Estudiante')";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $hash);

        if ($stmt->execute()) {
            echo "<script>alert('Usuario registrado correctamente'); window.location.href='../Estructura_UTrack/recuperar.php';</script>";
        } else {
            echo "<script>alert('Error al registrar usuario'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>
