<?php
class Database {
    public $conn;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = 'proyecto3';

    public function __construct() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
