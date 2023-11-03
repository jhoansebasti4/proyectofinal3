<?php
// adminController.php
require_once 'models/AdminModel.php';// Asegúrate de incluir el modelo
class AdminController {
    public function showUsuarios() {
        // Instanciamos el modelo AdminModel
        $model = new AdminModel();
        // Obtenemos la lista de permisos desde el modelo
        $usuarios = $model->getUsuarios();
        // Incluimos la vista de permisos y pasamos los datos
        include('views/permisos.php');
    }
    public function showMaestros() {
        // Instanciamos el modelo AdminModel
        $model = new AdminModel(); 
        // Obtenemos la lista de maestros desde el modelo
        $maestros = $model->getMaestros();
        // Incluimos la vista de maestros y pasamos los datos
        include('views/maestros.php');
    }
    public function showAlumnos() {
        // Instanciamos el modelo AdminModel
        $model = new AdminModel();   
        // Obtenemos la lista de alumnos desde el modelo
        $alumnos = $model->getAlumnos();
        // Incluimos la vista de alumnos y pasamos los datos
        include('views/alumnos.php');
    }
    public function showClases() {
        // Instanciamos el modelo AdminModel
        $model = new AdminModel();
        
        // Obtenemos la lista de clases desde el modelo
        $clases = $model->getClases();
        // Incluimos la vista de clases y pasamos los datos
        include('views/clases.php');
    }
}
?>
