<?php



class MaestroModel
{
    private $conn;
    private $table = "maestros";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Implementa los métodos CRUD para los maestros (crear, leer, actualizar, eliminar).
}
