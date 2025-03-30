<?php
    require 'db.php';
    require_once 'start-backend.php';
    resetDatabase();  
    
    session_start(); // Iniciar la sesión
    // Verificar si el usuario ha iniciado sesión
    $isLoggedIn = isset($_SESSION['user']); // Suponiendo que 'user' contiene la información del usuario autenticado
    $errr = isset($_SESSION['error']) ? $_SESSION['error'] : null;
    if ($errr) {
        echo '<script>alert("' . htmlspecialchars($errr) . '");</script>';
        unset($_SESSION['error']); // Limpiar el mensaje de error después de mostrarlo
    }
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
    
    <!-- Prototype y Scriptaculous -->
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/scriptaculous.js"></script>
    <script type="text/javascript" src="js/effects.js"></script>
</head>

<body class="w-100 h-100 bg-dark">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Reservas de Hoteles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link px-2" href="auth/sign-up.php" title="Sign Up">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header con información y login -->
  <div class="container-fluid bg-primary">
    <div class="row">
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
              <?php if ($isLoggedIn): ?>
                <h2 class="text-center">Sotto Hoteles Home</h2>
              <?php else: ?>
                <h2 class="text-center">Iniciar Sesión</h2>
              <?php endif; ?>
            </div>

            <div class="card-body">
              <?php if ($isLoggedIn): ?>
                <!-- Mostrar información del usuario -->
                <h3>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</h3>
                <p>Correo: <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
                <a href="auth/logout.php" class="btn btn-danger mt-3">Cerrar Sesión</a>
              <?php else: ?>
                <!-- Mostrar formulario de inicio de sesión -->
                <form action="auth/login.php" method="POST">
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
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Contenido Principal -->
  <div class="container mt-4 main-container">
    <!-- Buscador de sitios web -->
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

    <!-- Buscador de Hoteles -->
    <div class="card p-4 mb-4">
      <h2 class="text-center">Buscar Hoteles</h2>
      <div class="row g-2">
        <div class="col-md-8 offset-md-2">
          <input type="text" id="hotelSearch" class="form-control" placeholder="Buscar por nombre, ciudad o zona...">
        </div>
      </div>
    </div>

    <!-- Listado de Hoteles -->
    <div class="container mt-4">
      <h2 class="text-center mb-4">Lista de Hoteles Disponibles</h2>
      <div id="hotelesContainer" class="row">
        <!-- Las tarjetas de hoteles se cargarán vía Ajax -->
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center py-3 bg-primary text-white mt-4 w-100">
    <p>&copy; 2025 Reservas de Hoteles</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <script type="text/javascript">
    document.observe('dom:loaded', function() {
      // Efectos de aparición para elementos ya existentes
      $$('.hoteles-card').each(function(cardElement) {
        cardElement.hide();
        new Effect.Appear(cardElement, { duration: 2.0 });
      });
      $$('.bg-hotel').each(function(headerElement) {
        headerElement.hide();
        new Effect.Appear(headerElement, { duration: 2.0 });
      });
      
      // Función para cargar hoteles vía Ajax
      function cargarHoteles(query) {
        new Ajax.Request('filtrar_hoteles.php', {
          method: 'get',
          parameters: { q: query },
          onSuccess: function(response) {
            $('hotelesContainer').update(response.responseText);
          },
          onFailure: function() {
            $('hotelesContainer').update('<div class="alert alert-danger">Error al cargar los hoteles.</div>');
          }
        });
      }
      
      // Cargar todos los hoteles inicialmente (sin filtro)
      cargarHoteles('');
      
      // Actualizar listado de hoteles mientras se teclea en el buscador
      $('hotelSearch').observe('keyup', function(event) {
        var query = event.element().value;
        cargarHoteles(query);
      });
    });
  </script>
</body>
</html>
