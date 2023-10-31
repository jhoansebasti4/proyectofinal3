<?php

// controllers/MaestroController.php

class MaestroController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new MaestroModel($db);
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
