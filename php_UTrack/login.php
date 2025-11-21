<?php
require_once "base.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["correo"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($email === "" || $password === "") {
        echo "<script>alert('Por favor completa todos los campos'); window.history.back();</script>";
        exit;
    }

    try {
        $db = new Base();
        $conn = $db->conectar();

        $query = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $usuario["password_hash"])) {

                $_SESSION["usuario"] = $usuario["nombre_usuario"];
                $_SESSION["usuario_id"] = $usuario["id_usuario"];
                $_SESSION["logged_in"] = true;

                header("Location: ../Estructura_UTrack/menu.php");
                exit;

            } else {
                echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
            }

        } else {
            echo "<script>alert('Correo no encontrado'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "<script>alert('Error interno: " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>
