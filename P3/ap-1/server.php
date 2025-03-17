<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="../ap-2/styles.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-dark">

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Validar nombre
    if (!preg_match('/^[A-Za-z0-9]{3,20}$/', $username)) {
        die("❌ Error: El nombre debe contener solo letras y números (3-20 caracteres). ");
    }

    // Validar email con filtro de PHP
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Error: Email no válido.");
    }

    // Validar teléfono
    if (!preg_match('/^[0-9]{9,15}$/', $phone)) {
        die("❌ Error: El teléfono debe contener entre 9 y 15 dígitos numéricos.");
    }

    // Cifrar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Apartado2
    // signUp($username, $password, $email, $phone);

    echo '<div class="container">';
        echo '<div class="card d-flex justify-content-center align-items-center p-4">';
            echo '<h2 class="mb-10">✅ Registro exitoso</h2>';
            echo '<p><strong>Usuario:</strong> ' . $username . '</p>';
            echo '<p><strong>Contraseña:</strong> ' . str_repeat('*', strlen($password)) . '</p>';
            echo '<p><strong>Email:</strong> ' . $email . '</p>';
            echo '<p><strong>Teléfono:</strong> ' . $phone . '</p>';
        echo '</div>';
    echo '</div>';
}

?>
</body>
</html>
