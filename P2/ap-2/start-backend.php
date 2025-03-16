<?php
function resetDatabase($servername = "localhost:3666",
                       $username = "root",
                       $password = "",
                       $dbname = "hoteles") {

    try {
        // Conectar a MySQL con PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Borrar tablas si existen
        $dropTables = "
            DROP TABLE IF EXISTS reservas;
            DROP TABLE IF EXISTS users;
            DROP TABLE IF EXISTS hoteles;
            DROP TABLE IF EXISTS country_codes;
        ";
        $conn->exec($dropTables);

        // Cargar el archivo SQL
        $sqlFile = __DIR__ . '/hoteles.sql'; // Ruta absoluta del archivo
        if (file_exists($sqlFile)) {
            $sql = file_get_contents($sqlFile);
            $conn->exec($sql);
        } else {
            echo "❌ Error: No se encontró el archivo `hoteles.sql`.<br>";
        }
    } catch (PDOException $e) {
        die("❌ Error en la conexión: " . $e->getMessage());
    }
}
