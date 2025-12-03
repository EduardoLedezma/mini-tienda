<?php
// Mostrar errores para debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de base de datos para Heroku
$database_url = getenv('DATABASE_URL') ?: getenv('CLEARDB_DATABASE_URL');

if ($database_url) {
    // Parse la URL de la base de datos de Heroku
    $url = parse_url($database_url);
    $host = $url['host'] ?? '';
    $db = isset($url['path']) ? ltrim($url['path'], '/') : '';
    $user = $url['user'] ?? '';
    $pass = $url['pass'] ?? '';
    
    if (empty($host) || empty($db)) {
        die("Error: Variables de base de datos no configuradas correctamente en Heroku");
    }
} else {
    // Valores por defecto para desarrollo local
    $host = 'localhost';
    $db = 'tienda';
    $user = 'root';
    $pass = '';
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>