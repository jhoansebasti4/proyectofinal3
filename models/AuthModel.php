<?php
class AuthModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Crea una instancia de la clase Database
    }

    public function authenticate($email, $password) {
        try {
            $query = "SELECT * FROM usuarios WHERE Email_Usuario = :email AND password = :password AND Estado = 'Activo'";
            $stmt = $this->db->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user) {
                return true; // Credenciales válidas
            } else {
                return false; // Credenciales inválidas
            }
        } catch (PDOException $e) {
            error_log('Error de autenticación: ' . $e->getMessage());
            return false; // Credenciales inválidas debido al error de conexión
        }
    }
    

    public function getUserId($email) {
        try {
            // Realiza la consulta para obtener el ID del usuario
            $query = "SELECT ID FROM usuarios WHERE Email_Usuario = :email";
            $stmt = $this->db->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return $user['ID'];
            } else {
                return null; // Usuario no encontrado
            }
        } catch (PDOException $e) {
            // Manejar el error de conexión a la base de datos de manera más detallada
            error_log('Error al obtener el ID del usuario: ' . $e->getMessage());
            throw new Exception("Error al obtener información del usuario. Por favor, intenta de nuevo más tarde.");
        }
    }

    public function getUserRole($user_id) {
        if ($user_id === null) {
            return 'Desconocido'; // Usuario no encontrado, manejo de este caso
        }

        try {
            $query = "SELECT Permiso FROM usuarios WHERE ID = :user_id";
            $stmt = $this->db->conn->prepare($query);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return $user['Permiso'];
            } else {
                return 'Desconocido'; // Rol no encontrado
            }
        } catch (PDOException $e) {
            // Manejar el error de conexión a la base de datos de manera más detallada
            error_log('Error al obtener el rol del usuario: ' . $e->getMessage());
            throw new Exception("Error al obtener información del usuario. Por favor, intenta de nuevo más tarde.");
        }
    }
}
?>
