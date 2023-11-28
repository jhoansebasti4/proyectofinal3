<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('config.php');
include_once('User.php');
include_once('Rol.php');

class LoginController {
    public function __construct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleLogin();
        } else {
            // Mostrar formulario de inicio de sesión (vista)
            include('login_form.php');
        }
    }

    private function handleLogin() {
        $mail = $_POST['mail'];
        $password = $_POST['password'];
    
        $db = new Database("localhost", "root", "", "test"); // Asegúrate de crear la instancia de $db aquí
    
        $user = User::findByMail($mail, $db);
    
        if ($user && password_verify($password, $user->getPassword())) {
            $this->redirectToDashboard($user->getRol());
        } else {
            $this->showError("Inicio de sesión fallido. Verifica tu correo electrónico y contraseña.");
        }
    }
    

    private function redirectToDashboard($rol) {
        switch ($rol) {
            case 'Admin':
                header('Location: admin_dashboard.php');
                break;
            case 'Teacher':
                header('Location: teacher_dashboard.php');
                break;
            case 'Student':
                header('Location: student_dashboard.php');
                break;
            default:
                $this->showError("Rol desconocido");
        }
        exit();
    }

    private function showError($message) {
        echo $message;
        include('login_form.php');
    }
}

new LoginController();
?>
