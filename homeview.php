<?php
// Simulación de inicio de sesión del usuario
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: loginview.php'); // Redirigir si no está autenticado
    exit;
}
$username = $_SESSION['email']; // Obtener el nombre del usuario desde la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STARPY - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylehome.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>STARPY</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Inicio</a></li>
                <li><a href="mensajes.php">Mensajes</a></li>
                <li><a href="notificaciones.php">Notificaciones</a></li>
            </ul>
        </nav>
        <div class="user-inicio">
            <ul class="user-info"><?php echo $username; ?></ul>
            <ul class="user-info">
                <img src="src/Iconos/10948899.png" alt="User Icon">
            </ul> 
        </div>
    </header>

    <main>
        <div class="container mt-4">
            <div class="row">
                <!-- Publicaciones de las mipymes y empresas -->
                <div class="col-md-8">
                    <h2>Publicaciones</h2>
                    <div class="post">
                        <img src="src/Imagenes/post1.png" alt="Publicación" class="img-fluid">
                        <div class="post-details">
                            <h5>@usuario_mipyme</h5>
                            <p>Descripción de la publicación</p>
                            <button class="like-btn">
                                <img src="src/Iconos/heart.png" alt="Like Icon"> 34
                            </button>
                            <div class="comments-section">
                                <h6>Comentarios</h6>
                                <p>@usuario: Comentario...</p>
                                <input type="text" class="form-control" placeholder="Agregar comentario...">
                            </div>
                        </div>
                    </div>
                    <!-- Otra publicación -->
                    <div class="post mt-4">
                        <img src="src/Imagenes/post2.png" alt="Publicación" class="img-fluid">
                        <div class="post-details">
                            <h5>@empresa_grande</h5>
                            <p>Descripción de la publicación</p>
                            <button class="like-btn">
                                <img src="src/Iconos/heart.png" alt="Like Icon"> 100
                            </button>
                            <div class="comments-section">
                                <h6>Comentarios</h6>
                                <p>@usuario: Comentario...</p>
                                <input type="text" class="form-control" placeholder="Agregar comentario...">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Barra lateral con perfil y mensajes -->
                <div class="col-md-4">
                    <div class="profile-box">
                        <img src="src/Iconos/10948899.png" alt="User Icon" class="profile-img">
                        <h4><?php echo $username; ?></h4>
                        <p>Perfil: Mipyme</p> <!-- Puedes cambiar esto dinámicamente según el tipo de usuario -->
                        <a href="editar_perfil.php" class="btn btn-primary">Editar Perfil</a>
                    </div>

                    <div class="messages-box mt-4">
                        <h5>Mensajes</h5>
                        <div class="messages-list" style="max-height: 200px; overflow-y: auto;">
                            <!-- Ejemplo de mensaje -->
                            <div class="message">
                                <p><strong>@usuario1:</strong> Hola, ¿cómo estás?</p>
                            </div>
                            <div class="message">
                                <p><strong>@empresa_grande:</strong> Nos interesa tu servicio.</p>
                            </div>
                            <!-- Aquí se agregarán más mensajes -->
                        </div>
                        <form action="enviar_mensaje.php" method="POST" class="mt-2">
                            <input type="text" name="mensaje" class="form-control" placeholder="Escribe un mensaje...">
                            <input type="hidden" name="usuario" value="<?php echo $username; ?>">
                            <button type="submit" class="btn btn-primary mt-2">Enviar</button>
                        </form>
                    </div>

                    <div class="suggestions-box mt-4">
                        <h5>Sugerencias</h5>
                        <ul>
                            <li>@usuario_sugerido1</li>
                            <li>@empresa_sugerida2</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Your Company Name. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
