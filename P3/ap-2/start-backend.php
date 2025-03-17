<?php
function resetDatabase() {
    global $conn;

    try {
        // Borrar tablas si existen
        $dropTables = "
            DROP TABLE IF EXISTS hoteles;
            DROP TABLE IF EXISTS country_codes;
        ";
        $conn->exec($dropTables);

        // Cargar la nueva estructura de la base de datos

        // Crear tabla `hoteles`
        $conn->exec("
        CREATE TABLE IF NOT EXISTS `hoteles` (
                `id` int(10) UNSIGNED NOT NULL,
                `nombre` varchar(80) NOT NULL,
                `ciudad` varchar(80) DEFAULT NULL,
                `pais` varchar(80) DEFAULT NULL,
                `zona` varchar(80) DEFAULT NULL,
                `piscina` int(11) DEFAULT '0',
                `img` varchar(2083) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        // Insertar datos en `hoteles`
        $hoteles = [
            [10001, 'Hotel Roc Doblemar_mamamam', 'La Manga', 'España', 'Playa', 1, 'https://pix10.agoda.net/hotelImages/260/2600081/2600081_17092617340056817169.jpg?ca=6&ce=1&s=1024x768'],
            [10002, 'Hotel Nelva', 'Múrcia', 'España', 'Interior', 1, 'https://www.hotelmurcianelva.com/wp-content/uploads/sites/2492/nggallery/gallery-exterior/fotos_04_exteriores_exteriores_nocturnos_11.jpg'],
            [10003, 'Hotel Park Puigcerdà & Spa', 'Cerdanya', 'España', 'Montaña', 1, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0c/14/43/20/piscina.jpg?w=900&h=-1&s=1'],
            [10004, 'Hotel Cabana', 'Benidorm', 'España', 'Playa', 1, 'https://www.thespruce.com/thmb/I6pcHWsO9ZJ1pSfmWw4s-C_BG_M=/2128x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-509553708-c1c5eaa374094aa48038a8ba2959e98b.jpg'],
            [10005, 'Nestor Hotel', 'Ayia Napa', 'Chipre', 'Playa', 1, 'https://th.bing.com/th/id/OIP.c_R_u3V2uiuPy20qo8F5kQHaE7?rs=1&pid=ImgDetMain'],
            [10006, 'Hotel Perrakis', 'Andros Island', 'Grécia', 'Playa', 1, 'https://cdn.webhotelier.net/photos/w=1920/perrakis/L338867.jpg'],
            [10007, 'Hotel Cezar', 'Banja Luka', 'Bosnia y Herzegovina', 'Interior', 0, 'https://th.bing.com/th/id/OIP.jMi7jPh0NMYI3CsIXdZYiQHaE9?rs=1&pid=ImgDetMain'],
            [10008, 'Hotel Angelica', 'Limenas', 'Grécia', 'Playa', 0, 'https://images.yesalps.com/hp/287995/67523_esterno-estate.jpg'],
            [10009, 'Hotel Alanda', 'Marbella', 'España', 'Playa', 1, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1b/f6/84/36/alanda-hotel-marbella.jpg?w=900&h=-1&s=1'],
        ];

        $stmt = $conn->prepare("INSERT INTO `hoteles` (`id`, `nombre`, `ciudad`, `pais`, `zona`, `piscina`, `img`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        foreach ($hoteles as $hotel) {
            $stmt->execute($hotel);
        }

        //Alterar la tabla `users`
        $sql = "ALTER TABLE users MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT";
        $conn->exec($sql);


        // Verifica si la columna `descripcion` ya existe antes de agregarla
        $checkColumn = $conn->query("SHOW COLUMNS FROM `users` LIKE 'descripcion'");
        if ($checkColumn->rowCount() == 0) {
            $conn->exec("ALTER TABLE `users` ADD `descripcion` VARCHAR(255) DEFAULT NULL;");
            echo "✅ Campo `descripcion` agregado a la tabla `users`.<br>";
        } else {
            echo "⚠️ El campo `descripcion` ya existe en `users`.<br>";
        }

        // Verifica si la columna `phone` ya existe antes de agregarla
        $checkColumn = $conn->query("SHOW COLUMNS FROM `users` LIKE 'phone'");
        if ($checkColumn->rowCount() == 0) {
            $conn->exec("ALTER TABLE `users` ADD `phone` VARCHAR(15) DEFAULT NULL;");
            echo "✅ Campo `phone` agregado a la tabla `users`.<br>";
        } else {
            echo "⚠️ El campo `phone` ya existe en `users`.<br>";
        }
        // Crear tabla `country_codes`
        $conn->exec("
        CREATE TABLE IF NOT EXISTS `country_codes` (
                `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                `code` varchar(5) NOT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");

        // Insertar datos en `country_codes`
        $codes = ['+34', '+1', '+44', '+49', '+5959', '+33'];
        $stmt = $conn->prepare("INSERT INTO `country_codes` (`code`) VALUES (?)");
        foreach ($codes as $code) {
            $stmt->execute([$code]);
        }
        $conn = null; // Cerrar conexión

    } catch (PDOException $e) {
        die("❌ Error en la conexión: " . $e->getMessage());
    }
}
