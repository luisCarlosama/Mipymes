<?php
// Simulación de inicio de sesión del usuario
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: loginview.php'); // Redirigir si no está autenticado
    exit;
}

// Obtener el nombre, tipo de usuario e imagen de perfil desde la sesión
$username = $_SESSION['nombre']; 
$tipoUsuario = $_SESSION['tipo_usuario']; 
$profileImage = !empty($_SESSION['img_profile']) ? $_SESSION['img_profile'] : 'src/Iconos/user-placeholder.png'; // Imagen de placeholder si no hay imagen de perfil
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starpy - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="stylehomeprueba.css"> 
</head>
<body>
    <header>
        <div class="logo">
            <img src="src/Iconos/logomypime.png" alt="Logo de Starpy">
            <img src="src/Iconos/logomypime1.png" alt="Logo de Starpy">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="/mipymes/home.php">Inicio</a></li>
                <li><a href="/mipymes/mensajes.php">Mensajes</a></li>
                <li><a href="/mipymes/notificaciones.php">Notificaciones</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <div class="container"> <!-- Contenedor principal que organiza dos columnas -->
        <main class="main-content">
            <!-- Sección para crear publicaciones -->
            <section class="create-post">
                <h2>Crea una nueva publicación</h2>
                <form action="create_post.php" method="POST" enctype="multipart/form-data">
                    <textarea name="post_description" placeholder="¿Qué estás pensando?" required></textarea>
                    <input type="file" name="post_image" accept="image/*">
                    <button type="submit">Publicar</button>
                </form>
            </section>

            <!-- Sección de publicaciones -->
            <section class="posts-section">
                <h2>Publicaciones recientes</h2>
                <!-- Aquí podrías agregar un bucle para mostrar las publicaciones desde la base de datos -->
                <div class="post">
                    <div class="post-header">
                        <img src="<?php echo $profileImage; ?>" alt="Foto de perfil" class="profile-image">
                        <h3><?php echo $username; ?> (<?php echo $tipoUsuario; ?>)</h3> <!-- Mostrar el tipo de usuario -->
                    </div>
                    <p>Este es un ejemplo de una publicación. Aquí aparecerá el contenido que el usuario comparta.</p>
                    <img src="src/Imagenes/PrincipalMipymes1.png" alt="Imagen de la publicación" class="post-image">
                    
                    <div class="comments-section">
                        <div class="post-footer">
                            <button class="like-button">
                                <i class="far fa-heart"></i> <!-- Corazón vacío -->
                            </button>
                            <h6>Comentarios</h6>
                            <p><span>@usuario</span></p>
                            <input type="text" class="form-control" placeholder="Agregar comentario...">
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Sección del perfil de usuario -->
        <aside class="user-profile">
            <h2>Tu Perfil</h2>
            <div class="profile-info">
                <img src="<?php echo $profileImage; ?>" alt="Foto de perfil" class="profile-image">
                <h3><?php echo $username; ?></h3>
                <p>Tipo de perfil: <?php echo $tipoUsuario; ?></p> <!-- Mostrar tipo de usuario -->
                <p>Esta es la descripción del usuario. Puedes editar esta sección en cualquier momento.</p>
                <a href="edit_profile.php" class="edit-profile-btn">Editar perfil</a>
            </div>
        </aside>
    </div>
    
    <div class="container2" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        <!-- Información de Contacto -->
        <div class="InformaciónContacto" style="flex: 1; min-width: 250px; margin: 10px;">
            <h3>Contacto</h3>
            <p>+51 321 000 0000</p>
            <p><a href="mailto:Demomail@gmail.com">Demomail@gmail.com</a></p>
            <p>Pasto, Nariño, Colombia</p>
        </div>
    
        <!-- Nuestros Servicios -->
        <div class="Servicios" style="flex: 1; min-width: 250px; margin: 10px;">
            <h3>Nuestros Servicios</h3>
            <ul>
                <li>Servicio 1</li>
                <li>Servicio 2</li>
                <li>Servicio 3</li>
            </ul>
        </div>
    
        <!-- Redes Sociales -->
        <div class="redes" style="flex: 1; min-width: 250px; margin: 10px;">
            <h3>Síguenos en</h3>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">TikTok</a></li>
            </ul>
        </div>
    </div>

    <script src="style.js"></script>
    <footer>
        <p>&copy; 2024 Your Company Name. All Rights Reserved.</p>
    </footer>
</body>
</html>
