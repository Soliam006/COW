<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas de Hoteles</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Reservas de Hoteles</a>
        </div>
    </nav>
    <div class="container-fluid bg-primary">
        <div class="row ">
          <!-- Columna izquierda: fondo e información de la empresa -->
          <div class="col-md-6 d-none d-md-block bg-hotel">
            <div class="info-overlay d-flex align-items-center justify-content-center">
              <div class="text-center p-4">
                <h1>SottoReservas</h1>
                <p>
                  Bienvenido a SottoReservas, la plataforma líder en reservas de hoteles.<br>
                  Descubre las mejores ofertas y experiencias de lujo en cada estadía.
                </p>
              </div>
            </div>
          </div>
          <!-- Columna derecha: formulario de Login -->
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="w-75">
              <div class="card">
                <div class="card-header">
                  <h2>Sign In</h2>
                </div>
                <div class="card-body">
                  <form action="#" method="POST">
                    <div class="form-group">
                      <label for="username">Usuario</label>
                      <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Contraseña</label>
                      <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Ingresar</button>
                  </form>
                  <div class="mt-3">
                    <span>¿No tienes cuenta? <a href="#">Regístrate aquí</a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="container mt-4 main-container">
        
        <!-- Buscador -->
        <div class="card p-4 mb-4">
            <h2 class="text-center">Buscar en la Web</h2>
            <form class="row g-2" action="https://www.google.com/search" method="GET">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="q" placeholder="Buscar en Google...">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">Google</button>
                </div>
            </form>
            <form class="row g-2 mt-2" action="https://es.wikipedia.org/wiki/Especial:Buscar" method="GET">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="search" placeholder="Buscar en Wikipedia...">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-secondary w-100">Wikipedia</button>
                </div>
            </form>
        </div>
        <!-- Hoteles -->
        <div class="row">
        <?php
          $servername = "localhost:3380";
          $username = "root";
          $password = "password";

          try {
            $conn = new PDO("mysql:host=$servername;dbname=hoteles", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
          } catch(PDOException $e) {
            die ("Connection failed: " . $e->getMessage());
          }

          $result = $conn->query("SELECT * FROM hoteles");
          
          echo "<table border='1'>";
          # INSERT INTO `hoteles` (`id`, `nombre`, `ciudad`, `pais`, `zona`, `piscina`, `img`) VALUES
          echo "<tr><th>Nombre</th><th>Ubicación</th><th>Zona</th><th>Piscina</th></tr>";
          while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['ciudad'] . ", " . $row['pais'] . "</td>";
            echo "<td>" . $row['zona'] . "</td>";
            echo "<td>" . $row['piscina'] . "</td>";
            echo "<td>";
          }

          echo "</table>";

          $conn = null;
        ?>

            <!-- Hotel Poseidon Resort -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="https://z.cdrst.com/foto/hotel-sf/bccc/granderesp/poseidon-resort-exterior-12a0f615.jpg" class="card-img-top" alt="Hotel Poseidon Resort">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Poseidon Resort</h5>
                        <p class="card-text"><strong>Ubicación:</strong> Alicante, España</p>
                        <p><strong>Zona:</strong> Playa</p>
                        <p><strong>Piscina:</strong> ✅ Sí</p>
                        <p><strong>Estrellas:</strong> ⭐⭐⭐⭐</p>
                        <p><strong>Precio:</strong> €120/noche</p>
                    </div>
                </div>
            </div>

            <!-- Hotel Hesperia Murcia Centro -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="https://x.cdrst.com/cdrimg/hotel-sf/303741951/800x600/max-side/bfda41.jpg" class="card-img-top" alt="Hesperia Murcia Centro">
                    <div class="card-body">
                        <h5 class="card-title">Hesperia Murcia Centro</h5>
                        <p><strong>Ubicación:</strong> Murcia, España</p>
                        <p><strong>Zona:</strong> Interior</p>
                        <p><strong>Piscina:</strong> ✅ Sí</p>
                        <p><strong>Estrellas:</strong> ⭐⭐⭐</p>
                        <p><strong>Precio:</strong> €90/noche</p>
                    </div>
                </div>
            </div>

            <!-- Hotel Barceló Valencia -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="https://www.visitvalencia.com/sites/default/files/styles/gallery_default/public/crm-images/GALERIA_Hotel%20Barcel%C3%B3%20Valencia_terraza_1.jpg?itok=1VUWJf7s" class="card-img-top" alt="Hotel Barceló Valencia">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Barceló Valencia</h5>
                        <p><strong>Ubicación:</strong> Valencia, España</p>
                        <p><strong>Zona:</strong> Ciudad</p>
                        <p><strong>Piscina:</strong> ✅ Sí</p>
                        <p><strong>Estrellas:</strong> ⭐⭐⭐⭐</p>
                        <p><strong>Precio:</strong> €110/noche</p>
                    </div>
                </div>
            </div>
            
            <!-- Hotel Riu Plaza España -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="https://www.riu.com/dam/02-RIU-Espanol/Building-Blocks/04-Paises/01-Espana/11-Madrid/01-Hotel-Riu-Plaza-Espana/Imagenes/018-Servicio-y-Instalaciones/Pasarela-Rooftop-2.jpg" class="card-img-top" alt="Hotel Riu Plaza España">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Riu Plaza España</h5>
                        <p><strong>Ubicación:</strong> Madrid, España</p>
                        <p><strong>Zona:</strong> Ciudad</p>
                        <p><strong>Piscina:</strong> ✅ Sí</p>
                        <p><strong>Estrellas:</strong> ⭐⭐⭐⭐⭐</p>
                        <p><strong>Precio:</strong> €150/noche</p>
                    </div>
                </div>
            </div>

            <!-- Hotel Nelva -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <img src="https://www.viajeselcorteingles.es/imagenes/hoteles/espana/murcia/dwqx7zkg/3_x.jpg" class="card-img-top" alt="Hotel Nelva">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Nelva</h5>
                        <p><strong>Ubicación:</strong> Murcia, España</p>
                        <p><strong>Zona:</strong> Ciudad</p>
                        <p><strong>Piscina:</strong> ✅ Sí</p>
                        <p><strong>Estrellas:</strong> ⭐⭐⭐⭐</p>
                        <p><strong>Precio:</strong> €100/noche</p>
                    </div>
                </div>
            </div>

        </div> <!-- Fin de fila de hoteles -->
    </div> <!-- Fin del contenedor -->
    <!-- Footer -->
    <footer class="text-center py-3 bg-primary text-white mt-4">
        <p>&copy; 2025 Reservas de Hoteles</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
