<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
</head>
<body class="w-100 h-100 bg-dark">

<?php
require '../db.php';
require_once '../CRUD/create_user.php';

$message = ""; // Variable para mostrar el estado del registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = userInformationPost();
    if ($result === true) {
        $message = "<div class='alert alert-success'>✅ Registro exitoso. Ya puedes iniciar sesión.</div>";
    } else {
        $message = "<div class='alert alert-danger'>❌ " . $result . "</div>";
    }
}
?>

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
                    <a class="nav-link px-2" href="../">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container d-flex justify-content-center align-items-center vh-100 bg-dark">
    <div class="row justify-content-center">
        <div class="card shadow p-4">
            <h2 class="text-center mb-4">Registro de Usuario</h2>

            <!-- Mensaje de estado del registro -->
            <?php echo $message; ?>

            <form id="registrationForm" action="../auth/sign-up.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="username" name="username" required
                           pattern="[A-Za-z0-9]{3,20}" title="Solo letras y números, entre 3 y 20 caracteres.">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono:</label>
                    <div class="input-group">
                        <select class="form-select" name="country_code" required style="flex: 0.3;">
                            <?php
                            require_once '../db.php';
                            global $conn;
                            try {
                                $stmt = $conn->query("SELECT code FROM country_codes ORDER BY code ASC");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $selected = ($row['code'] == '+34') ? 'selected' : '';
                                    echo '<option value="' . $row['code'] . '" ' . $selected . '>' . $row['code'] . '</option>';
                                }
                            } catch (PDOException $e) {
                                echo '<option value="">❌ Error al cargar</option>';
                            }
                            ?>
                        </select>
                        <input type="tel" class="form-control" id="phone" name="phone" required
                               pattern="[0-9]{9,15}" title="Solo números, entre 9 y 15 dígitos." placeholder="123456789">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required pattern=".{6,50}"
                           title="Mínimo 6 caracteres.">
                </div>

                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.observe('dom:loaded', function() {
  $('registrationForm').observe('submit', function(event) {
    event.stop(); // Prevenir el envío tradicional
    new Ajax.Request('create_user.php', {
      method: 'post',
      parameters: Form.serialize('registrationForm'),
      onSuccess: function(response) {
        // Actualiza el contenedor de mensajes con la respuesta del servidor
        $('message').update(response.responseText);
      },
      onFailure: function() {
        $('message').update('Error en el registro.');
      }
    });
  });
});
</script>
</body>
</html>
