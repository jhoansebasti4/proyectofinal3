<?php
// Incluye el archivo Database.php
require_once(__DIR__ . '/../models/Database.php');

// Inicializa la sesión
session_start();

// Comprueba si el formulario se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Convierte la contraseña a minúsculas antes de hashear
    $hashedPassword = password_hash(strtolower($password), PASSWORD_DEFAULT);

    // Crea una instancia de la clase Database
    $database = new Database();
    $conn = $database->connect();

    // Activa el modo de error de PDO para depuración
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepara una consulta para verificar las credenciales del usuario
    $query = "SELECT id, email_usuario, permiso, estado, password FROM usuarios WHERE email_usuario = :email";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene los resultados

        if ($usuario) {
            // Ahora puedes usar $usuario después de obtener los resultados

            // Antes de la comparación con password_verify
            var_dump($password);

            // Convierte el permiso a minúsculas antes de comparar
            $permiso = strtolower($usuario['permiso']);

            if (strcasecmp($permiso, 'administrador') === 0) {
                // Redirige al administrador
                header('Location: /views/admin/permisos.php');
                exit(); // Importante: detener la ejecución después de redirigir
            } elseif (strcasecmp($permiso, 'maestro') === 0) {
                // Redirige al maestro
                header('Location: /views/maestro/alumnos.php');
                exit();
            } elseif (strcasecmp($permiso, 'alumno') === 0) {
                // Redirige al alumno
                header('Location: /views/alumno/calificaciones.php');
                exit();
            } else {
                // Rol desconocido
                echo "Rol de usuario desconocido.";
            }
        } else {
            echo "Usuario no encontrado. Por favor, verifica tus credenciales.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
}
?>
