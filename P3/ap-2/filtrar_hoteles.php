<?php
// filtrar_hoteles.php

require 'db.php'; // Conexión a la base de datos, genera la variable $conn

// Recoger el parámetro de búsqueda
$q = isset($_GET['q']) ? trim($_GET['q']) : '';

try {
    if ($q === '') {
        // Si no hay término de búsqueda, seleccionar todos los hoteles
        $stmt = $conn->query("SELECT * FROM hoteles");
    } else {
        // Preparar la consulta para filtrar por nombre, ciudad o zona
        $stmt = $conn->prepare("SELECT * FROM hoteles WHERE nombre LIKE :search OR ciudad LIKE :search OR zona LIKE :search");
        $searchTerm = '%' . $q . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
    }
    
    // Generar el HTML para cada hotel
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="col-12 col-md-6 col-lg-4 mb-4">';
        echo '  <div class="card hoteles-card" data-hotel-id="' . htmlspecialchars($row['id']) . '">';
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
    echo '<div class="alert alert-danger">Error: ' . $e->getMessage() . '</div>';
}

// Cerrar la conexión (opcional)
$conn = null;
?>
