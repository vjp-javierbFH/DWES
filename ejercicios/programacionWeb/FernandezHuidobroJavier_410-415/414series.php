<?php
// Iniciar sesión y verificar si el usuario está logueado
session_start();
if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] !== true) {
  header("Location: 410index.php");
  exit;
}

echo "<style>
        body { background-color: rgb(182, 173, 173); }
        ul { list-style-type: square; color: green; }
        .menu { margin-bottom: 20px; }
      </style>";

// Menú de navegación
echo '<div class="menu">
        <a href="412peliculas.php">Películas</a> | 
        <a href="414series.php">Series</a> | 
        <a href="413logout.php">Cerrar sesión</a>
      </div>';

// Mostrar listado de series
echo "<h1>Listado de Series</h1>";
echo "<ul>";
foreach ($_SESSION['series'] as $serie) {
  echo "<li>$serie</li>";
}
