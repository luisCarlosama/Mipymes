<?php
include('../../config/database.php');

$host = "localhost";
$dbname = "mipymes";  
$username = "postgres"; 
$password = "carlosama56"; 
$port = "5432";  // Asegúrate de que el puerto es correcto

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña
    $tipo_usuario = $_POST['tipo_mipyme'];

    // Manejo de la imagen de perfil
    $img_profile = null; // Inicialmente nulo

    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profilePicture']['tmp_name'];
        // Cargar la imagen en formato binario
        $img_profile = file_get_contents($fileTmpPath); // Leer el contenido del archivo

        // Verificar si se ha leído correctamente
        if ($img_profile === false) {
            $message = "Error al leer el archivo de imagen.";
            // Redirigir a signup.html con el mensaje de error
            header("Location: /mipymes/signupview.php?error=" . urlencode($message));
            exit;
        }
    } else {
        // Redirigir a signup.html si no se seleccionó archivo
        header("Location: /mipymes/signupview.php?error=" . urlencode("No se ha seleccionado ningún archivo."));
        exit;
    }

    // Verificar si el correo electrónico ya existe
    $checkEmailSql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
    $checkStmt = $conn->prepare($checkEmailSql);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();
    $emailCount = $checkStmt->fetchColumn();

    if ($emailCount > 0) {
        // Redirigir a signup.html con mensaje de error si el correo ya existe
        header("Location: /mipymes/signupview.php?error=" . urlencode("El correo electrónico ya está en uso."));
        exit;
    } else {
        // Inserción de datos en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, password, tipo_usuario, img_profile, created_at, updated_at, deleted_at) 
                VALUES (:nombre, :email, :password, :tipo_usuario, :img_profile, NOW(), NOW(), NULL)";
        $stmt = $conn->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $stmt->bindParam(':img_profile', $img_profile, PDO::PARAM_LOB); // Usar PDO::PARAM_LOB para el campo BYTEA

        if ($stmt->execute()) {
            // Redirigir a home.php si el registro es exitoso
            header("Location: /mipymes/homeview.php");
            exit;
        } else {
            // Redirigir a signup.html con mensaje de error en caso de fallo
            header("Location: /mipymes/signupview.php?error=" . urlencode("El correo electrónico ya está en uso."));
    exit;
        }
    }
}
?>
