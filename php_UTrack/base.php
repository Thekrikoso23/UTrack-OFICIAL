<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Base {
    private $host = "localhost";
    private $port = "3308"; 
    private $db_name = "utrack";
    private $username = "root";
    private $password = "";
    private $conn;

    public function conectar() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
