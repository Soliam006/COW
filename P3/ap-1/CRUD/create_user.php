<?php
function userInformationPost() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        global $conn;

        $username = $password = $email = $phone = $country_code = $hashed_password = '';

        try {
            // Recoger y limpiar datos
            if (isset($_POST['username'])) {
                $username = trim($_POST['username']);
            }
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            }
            if (isset($_POST['email'])) {
                $email = trim($_POST['email']);
            }
            if (isset($_POST['phone'])) {
                $phone = trim($_POST['phone']);
            }
            if (isset($_POST['country_code'])) {
                $country_code = trim($_POST['country_code']);
            }


            // Validar nombre
            if (!preg_match('/^[A-Za-z0-9]{3,20}$/', $username)) {
                throw new Exception("❌ Error: El nombre debe contener solo letras y números (3-20 caracteres). ");
            }

            // Validar email con filtro de PHP
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("❌ Error: Email no válido.");
            }

            // Validar teléfono
            if (!preg_match('/^[0-9]{9,15}$/', $phone)) {
                throw new Exception("❌ Error: El teléfono debe contener entre 9 y 15 dígitos numéricos.");
            }

            $desc = ' ';

            if ($username && $hashed_password && $email && $phone) {
                // Verificar si el usuario ya existe
                $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR name = ?");
                $stmt->execute([$email, $username]);
                if ($stmt->rowCount() > 0) {
                    return "El usuario ya existe en nuestra base de datos.";
                }

                // Insertar usuario
                $sql = "INSERT INTO users (`name`, `email`, `password`, `descripcion`, `phone`)
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$username, $email, $hashed_password, $desc, $phone]);

                return true; // Registro exitoso
            }
        } catch (PDOException $e) {
            return "Error en el registro: " . $e->getMessage();
        }catch (Exception $e) {
            return $e->getMessage();
        }
    }

    return "Error desconocido en el registro.";
}