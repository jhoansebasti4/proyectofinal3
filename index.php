<?php
// Incluye el archivo de configuración de la base de datos y otros archivos necesarios
require_once(__DIR__ . '/models/DataBase.php');
require_once(__DIR__ . '/controllers/AdminController.php');
require_once(__DIR__ . '/controllers/AlumnoController.php');
require_once(__DIR__ . '/controllers/MaestroController.php');
require_once(__DIR__ . '/controllers/LoginController.php'); // Cambio de nombre

$loginController = new LoginController();

// Define las rutas y los controladores asociados.
$routes = array(
    'login' => 'login',   // Ruta a la página de inicio de sesión
    'admin' => 'admin',   // Ruta a la página de administrador
    'alumno' => 'alumno', // Ruta a la página de alumno
    'maestro' => 'maestro' // Ruta a la página de maestro
);

// Verifica si la ruta solicitada existe en la lista de rutas.
if (isset($_GET['url']) && array_key_exists($_GET['url'], $routes)) {
    $controllerName = $routes[$_GET['url']];
    $controller = new $controllerName();

    // Llama a la función correspondiente en el controlador.
    $action = 'login'; // Acción predeterminada
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    // Verifica si el usuario está autenticado.
    if ($_GET['url'] !== 'login' && !isset($_SESSION['user_id'])) {
        // Si el usuario no está autenticado y la ruta no es la de inicio de sesión, redirige al inicio de sesión.
        header("Location: index.php?url=login");
        exit();
    }

    // Llama al controlador y la acción correspondientes.
    $controller->$action();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->login();
} elseif (isset($_GET['logout'])) {
    $loginController->logout();
} else {
    // Cambia la inclusión de la vista para que sea la página de inicio de sesión.
    include('views/login.php');
}
