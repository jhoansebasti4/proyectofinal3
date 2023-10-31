<?php



class ClaseModel
{
    private $conn;
    private $table = "clase";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Implementa los métodos CRUD para los maestros (crear, leer, actualizar, eliminar).
}
