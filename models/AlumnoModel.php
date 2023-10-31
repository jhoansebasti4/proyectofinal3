<?php

// models/MaestroModel.php

class AlumnoModel
{
    private $conn;
    private $table = "alumno";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Implementa los métodos CRUD para los maestros (crear, leer, actualizar, eliminar).
}
