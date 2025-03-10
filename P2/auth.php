<?php
// Funciones para Sign Up y Sign In
function signUp($username, $password, $email, $phone) {
    $servername = "localhost:3380";
    $username = "root";
    $password = "password";
    $dbname = "users";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO users (username, password, email, phone) VALUES (:username, :password, :email, :phone)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();
        echo "Usuario creado correctamente";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}

function signIn($username, $password) {
    $servername = "localhost:3380";
    $username = "root";
    $password = "password";
    $dbname = "users";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            echo "Usuario autenticado correctamente";
            return 
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;

}