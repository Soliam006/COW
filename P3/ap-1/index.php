<?php
    require 'db.php';
    require_once 'start-backend.php';
    resetDatabase();
?>
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
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/scriptaculous.js"></script>
</head>

<body class="w-100 h-100 bg-dark">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Reservas de Hoteles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link px-2" href="auth/sign-up.php" title="Sign Up"
            >Sign Up</a>
          </li>
        </ul>
      </div>
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
                    <span>¿No tienes cuenta? <a href="auth/sign-up.php">Regístrate aquí</a></span>
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
          <div class="container mt-4">
            <h2 class="text-center mb-4">Lista de Hoteles Disponibles</h2>
            <div class="row">

              <?php
                try {
                    require 'db.php';
                    // Variable de Conexión a Base de Datos
                    global $conn;

                    $result = $conn->query("SELECT * FROM hoteles");

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-12 col-md-6 col-lg-4 mb-4">';
                        echo '  <div class="card">';
                        echo '    <img src="' . htmlspecialchars($row['img']) . '" class="card-img-top" alt="' . htmlspecialchars($row['nombre']) . '">';
                        echo '    <div class="card-body">';
                        echo '      <h5 class="card-title">' . htmlspecialchars($row['nombre']) . '</h5>';
                        echo '      <p><strong>Ubicación:</strong> ' . htmlspecialchars($row['ciudad']) . ', ' . htmlspecialchars($row['pais']) . '</p>';
                        echo '      <p><strong>Zona:</strong> ' . htmlspecialchars($row['zona']) . '</p>';
                        echo '      <p><strong>Piscina:</strong> ' . ($row['piscina'] ? '✅ Sí' : '❌ No') . '</p>';
                        echo '    </div>';
                        echo '  </div>';
                        echo '</div>';
                    }
                } catch (PDOException $e) {
                    echo '<p class="text-danger text-center">Error en la conexión: ' . $e->getMessage() . '</p>';
                }

                $conn = null;
              ?>

            </div> <!-- Fin de fila de hoteles -->
          </div> <!-- Fin del contenedor -->
    </div>
    <!-- Footer -->
    <footer class="text-center py-3 bg-primary text-white mt-4 w-100">
        <p>&copy; 2025 Reservas de Hoteles</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    // Esperamos a que el contenido DOM esté completamente cargado
    document.addEventListener('DOMContentLoaded', function() {
      // Seleccionamos todos los elementos con clase "card"
      $$('.card').each(function(cardElement) {
        // Aparecer gradualmente cada card (duración = 1 segundo, por ejemplo)
        new Effect.Appear(cardElement, { duration: 1.0 });
      });
    });
  </script>

</body>
</html>
