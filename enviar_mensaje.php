<?php
include('../../config/database.php');

session_start();
$usuario = $_POST['usuario'];
$mensaje = $_POST['mensaje'];

// Validar que el mensaje no esté vacío
if (!empty($mensaje)) {
    // Inserta el mensaje en la base de datos (ajusta la consulta según tu esquema)
    $sql = "INSERT INTO mensajes (usuario, mensaje) VALUES ('$usuario', '$mensaje')";
    if (mysqli_query($conn, $sql)) {
        // Redirigir de vuelta al home
        header('Location: home.php');
    } else {
        echo "Error al enviar el mensaje: " . mysqli_error($conn);
    }
}
?>
 <!-- Sección de Mensajes -->
 <section class="messages-section">
            <h2>Mensajes</h2>
            <div class="message-box">
                <div class="message">
                    <div class="message-header">
                        <img src="src/Iconos/user-placeholder.png" alt="Foto de perfil">
                        <h3>Nombre del Usuario</h3>
                    </div>
                    <div class="message-body sent">
                        <p>Este es un mensaje enviado por el usuario.</p>
                    </div>
                    <div class="message-body received">
                        <p>Este es un mensaje recibido por el usuario.</p>
                    </div>
                </div>
                <!-- Aquí pueden colocarse más mensajes entre usuarios -->
            </div>
        </section>
