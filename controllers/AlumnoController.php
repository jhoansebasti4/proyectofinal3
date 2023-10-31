<?php

// controllers/MaestroController.php

class AlumnoController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new AlumnoModel($db);
    }

    public function index()
    {
        // Lógica para mostrar la vista de maestro.
    }

    public function verAlumnos()
    {
        // Lógica para mostrar los alumnos de un maestro.
    }
}
