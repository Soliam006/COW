<?php // Se utiliza para conectar a la base de datos
$servername = "localhost:3380";
$username = "root";
$password = "";
$dbname = "hoteles";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("❌ Por favor, revisa -db.php- y cambia el puerto al correcto. Gracias. Error en la conexión: " . $e->getMessage());
}