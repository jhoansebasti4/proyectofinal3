<?php
class AdminModel {
    private $db; // Variable para la conexión a la base de datos

    public function __construct() {
        // Configura la conexión a la base de datos en el constructor
        $this->db = new PDO('mysql:host=localhost;dbname=proyecto3', 'root', '');
    }

    public function getUsuarios() {
        // Consulta SQL para obtener los permisos
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMaestros() {
        // Consulta SQL para obtener la lista de maestros
        $sql = "SELECT * FROM maestros";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAlumnos() {
        // Consulta SQL para obtener la lista de alumnos
        $sql = "SELECT * FROM alumnos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClases() {
        // Consulta SQL para obtener la lista de clases
        $sql = "SELECT * FROM clases";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
