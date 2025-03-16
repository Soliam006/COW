<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-dark">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <!-- Controla el tamaño en diferentes dispositivos -->
            <div class="card shadow p-4">
                <h2 class="text-center mb-4">Registro de Usuario</h2>
                <form action="../server.php" method="POST">
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
                        <input type="tel" class="form-control" id="phone" name="phone" required
                               pattern="[0-9]{9,15}" title="Solo números, entre 9 y 15 dígitos.">
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
</div>

</body>
</html>
