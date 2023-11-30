<?php
require_once '/controller/AdminController.php';
require_once '/models/AdminModel.php';

$controller = new AdminController($db);
$model = new AdminModel();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'permisos':
            $controller->showUsuarios();
            break;
        case 'maestros':
            $controller->showMaestros();
            break;
        case 'alumnos':
            $controller->showAlumnos();
            break;
        case 'clases':
            $controller->showClases();
            break;
        default:
            
            break;
    }
}
