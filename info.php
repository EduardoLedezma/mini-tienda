<?php
// Archivo de diagnóstico para Heroku
phpinfo();
echo "<hr>";
echo "<h2>Variables de Entorno</h2>";
echo "DATABASE_URL: " . (getenv('DATABASE_URL') ? 'SET' : 'NOT SET') . "<br>";
echo "CLEARDB_DATABASE_URL: " . (getenv('CLEARDB_DATABASE_URL') ? 'SET' : 'NOT SET') . "<br>";
echo "<h2>Rutas</h2>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "Script Filename: " . __FILE__ . "<br>";
echo "Current Dir: " . __DIR__ . "<br>";
?>