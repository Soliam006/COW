<?php
session_start();
require '../db.php'; // Base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    global $conn; // Conexión a la base de datos

    $name = trim($_POST['username']); // Cambiado a $name para coincidir con la base de datos
    $password = trim($_POST['password']);

    echo '<script>console.log("Username: ' . $name . ' Password: ' . $password . ' ");</script>'; // Para depuración

    // Validar que los campos no estén vacíos
    if (empty($name) || empty($password)) {
        $_SESSION['error'] = 'Por favor, completa todos los campos.';
        header('Location: ../index.php');
        exit;
    }

    // Consultar la base de datos para verificar las credenciales
    $stmt = $conn->prepare('SELECT * FROM users WHERE name = ?');
    $stmt->execute([$name]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<script>console.log("User: ' . json_encode($user) . ' ");</script>'; // Para depuración

    if ($user && password_verify($password, $user['password'])) {
        // Credenciales válidas, guardar información del usuario en la sesión
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['name'], // 'name' en la base de datos
            'email' => $user['email']
        ];
        header('Location: ../index.php');
        exit;
    } else {
        // Credenciales inválidas
        $_SESSION['error'] = 'Usuario o contraseña incorrectos. '. $user['password'] . $user['name'];
        echo '<script>console.log("Error: ' . $_SESSION['error'] . ' ");</script>'; // Para depuración
        header('Location: ../index.php');
        exit;
    }
} else {
    // Si no es una solicitud POST, redirigir al formulario de inicio de sesión
    header('Location: ../index.php');
    exit;
}