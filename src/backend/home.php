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
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header('Location: loginview.php'); // Redirigir si no está autenticado
    exit;
}

// Obtener el email del usuario desde la sesión
$email = $_SESSION['email'];

// Conexión a la base de datos
try {
    $pdo = new PDO('mysql:host=localhost;dbname=mipymes', 'usuario', 'contraseña'); // Ajusta las credenciales
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar el id, nombre, imagen de perfil y tipo de usuario en la base de datos
    $sql = "SELECT id, nombre, img_profile, tipo_usuario FROM Usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si no se encuentra el usuario, redirigir a la página de login
    if (!$user) {
        session_destroy();
        header('Location: loginview.php');
        exit;
    }

    // Asignar variables del usuario
    $username = !empty($user['nombre']) ? $user['nombre'] : 'Usuario';
    $profileImage = !empty($user['img_profile']) ? $user['img_profile'] : 'src/Iconos/user-placeholder.png';
    $tipoUsuario = !empty($user['tipo_usuario']) ? $user['tipo_usuario'] : 'Tipo no definido';
    $userId = $user['id'];

    // Manejo de las publicaciones
    $publicaciones = [];
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_description'])) {
        $descripcion = $_POST['post_description'];
        $imagen = $_FILES['post_image']['name'];
        $target_dir = "ruta/a/tu/carpeta/publicaciones/"; // Cambia esta ruta según sea necesario
        $target_file = $target_dir . basename($imagen);

        // Mover el archivo subido a la carpeta deseada
        if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target_file)) {
            // Guardar la publicación en la base de datos
            $sql = "INSERT INTO publicaciones (id_usuario, imagen_url, descripcion, created_at, updated_at) VALUES (:id_usuario, :imagen_url, :descripcion, NOW(), NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $userId);
            $stmt->bindParam(':imagen_url', $target_file);
            $stmt->bindParam(':descripcion', $descripcion);

            if ($stmt->execute()) {
                header('Location: homeprueba.php'); // Redirigir después de crear la publicación
                exit;
            } else {
                echo "Error al agregar la publicación.";
            }
        } else {
            echo "Error al subir la imagen.";
        }
    }

    // Consultar las publicaciones recientes
    $sql = "SELECT p.id, p.imagen_url, p.descripcion, p.created_at, u.nombre, u.img_profile FROM publicaciones p JOIN Usuarios u ON p.id_usuario = u.id ORDER BY p.created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $publicaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Manejo de los comentarios
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])) {
        $comment = $_POST['comment'];
        $postId = $_POST['post_id']; // Se asume que el ID de la publicación se envía en el formulario

        // Guardar el comentario en la base de datos
        $sql = "INSERT INTO comentarios (id_usuario, id_publicacion, contenido, created_at, updated_at) VALUES (:id_usuario, :id_publicacion, :contenido, NOW(), NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $userId);
        $stmt->bindParam(':id_publicacion', $postId);
        $stmt->bindParam(':contenido', $comment);

        if ($stmt->execute()) {
            echo "Comentario agregado correctamente.";
        } else {
            echo "Error al agregar el comentario.";
        }
    }

    // Manejo de "me gusta"
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['like'])) {
        $postId = $_POST['post_id'];

        // Verificar si el usuario ya ha dado "me gusta"
        $sql = "SELECT * FROM corazones WHERE id_usuario = :id_usuario AND id_publicacion = :id_publicacion";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $userId);
        $stmt->bindParam(':id_publicacion', $postId);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            // Si no ha dado "me gusta", insertarlo
            $sql = "INSERT INTO corazones (id_usuario, id_publicacion, created_at, updated_at) VALUES (:id_usuario, :id_publicacion, NOW(), NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $userId);
            $stmt->bindParam(':id_publicacion', $postId);
            $stmt->execute();
        } else {
            // Si ya ha dado "me gusta", eliminarlo
            $sql = "DELETE FROM corazones WHERE id_usuario = :id_usuario AND id_publicacion = :id_publicacion";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $userId);
            $stmt->bindParam(':id_publicacion', $postId);
            $stmt->execute();
        }
    }
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
