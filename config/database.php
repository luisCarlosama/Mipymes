<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');  
define('DB_NAME', 'mipymes');    
define('DB_USER', 'postgres');   
define('DB_PASS', 'carlosama56'); 
define('DB_PORT', '5432');      

// Conexión a la base de datos
$conn = pg_connect(
    "host=" . DB_HOST . " " .
    "dbname=" . DB_NAME . " " .
    "user=" . DB_USER . " " .
    "password=" . DB_PASS . " " .
    "port=" . DB_PORT
);

// Verificación de la conexión
if (!$conn) {
    //error con pg_last_error()
    error_log("Error de conexión a la base de datos: " . pg_last_error());
    exit("Error de conexión. Consulte el archivo de registro para más detalles.");
} else {
    error_log("¡Conexión exitosa a la base de datos!");
}

?>
