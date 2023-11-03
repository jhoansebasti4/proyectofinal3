<?php
class LoginController {
    public function login() {
        if (isset($_SESSION['user_id'])) {
            $authModel = new AuthModel();
            $user_id = $authModel->getUserId($_SESSION['user_id']);
            $user_role = $authModel->getUserRole($user_id);
            $this->redirectToDashboard($user_role);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $authModel = new AuthModel();
            if ($authModel->authenticate($email, $password)) {
                $user_id = $authModel->getUserId($email);
                $user_role = $authModel->getUserRole($user_id);
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_role'] = $user_role;
                $this->redirectToDashboard($user_role);
            } else {
                $error = "Credenciales inválidas, por favor intenta de nuevo.";
                // Manejar el error de autenticación aquí.
                error_log('Error de autenticación para el usuario ' . $email);
                // Corregir la ruta para incluir una vista de error, si es necesario.
                include('views/login.php');
            }
        } else {
            // Corregir la ruta aquí para que coincida con tu estructura de archivos.
            include('views/login.php');
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        $this->redirectToLogin();
    }

    private function redirectToDashboard($user_role) {
        // Redirige al panel adecuado según el rol del usuario
        if ($user_role === 'admin') {
            header("Location: views/admin/dashboard.php");
        } elseif ($user_role === 'maestro') {
            header("Location: views/maestro/dashboard.php");
        } elseif ($user_role === 'alumno') {
            header("Location: views/alumno/dashboard.php");
        } else {
            // Si el rol es desconocido o no coincide con ninguno de los anteriores, redirige a una página de error o al inicio de sesión.
            header("Location: views/login.php");
        }
        exit();
    }

    private function redirectToLogin() {
        // Corregir la ruta aquí para redirigir al inicio de sesión.
        header("Location: views/login.php");
        exit();
    }
}
?>
