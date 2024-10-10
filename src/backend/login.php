<?php
    ob_start();
    include('../../config/database.php');

    session_start(); // Iniciar sesión si aún no ha iniciado
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    $host = "localhost";
    $dbname = "mipymes";  
    $username = "postgres"; 
    $password = "carlosama56";  

    try {
        // Conectar a la base de datos usando PDO
        $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Verificar si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Verificar si el campo del email o la contraseña están vacíos
            if (empty($email) || empty($password)) {
                echo "Por favor, rellene ambos campos.";
                exit;
            }
    
            // Consultar en la base de datos si el usuario existe (tabla usuarios)
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
    
            // Verificar si se encontró el usuario
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                var_dump($user);
                // Verificar si la contraseña ingresada coincide con la almacenada en la base de datos
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    header("Location: /mipymes/homeprueba.php");
                    exit;
                } else {
                    header("Location: /mipymes/loginview.php?error=" . urlencode("Contraseña incorrecta."));
                    exit;
                }
            } else {
                header("Location: /mipymes/loginview.php?error=" . urlencode("No se encontró una cuenta asociada con ese correo electrónico."));
                exit;
            }
        }
    } catch (PDOException $e) {
        header("Location: /mipymes/loginview.php?error=" . urlencode("Error en la conexión a la base de datos."));
        exit;
    }
?>