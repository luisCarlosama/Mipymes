<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="stylessignupview.css">


    <script>
        function updateLabel() {
            const input = document.getElementById('profilePicture');
            const icon = document.getElementById('profileIcon');

            // Cambia el color del borde según si hay un archivo seleccionado
            if (input.files.length > 0) {
                icon.style.filter = 'none'; // Eliminar el filtro para mostrar el color original
                icon.style.border = '2px solid blue'; // Cambiar borde a azul
            } else {
                icon.style.filter = 'grayscale(100%)'; // Mantener gris
                icon.style.border = '2px solid gray'; // Borde gris por defecto
            }
        }

        function validateForm() {
            const nombre = document.forms["myForm"]["nombre"].value;
            const email = document.forms["myForm"]["email"].value;
            const password = document.forms["myForm"]["password"].value;
            const tipoMipyme = document.querySelector('input[name="tipo_mipyme"]:checked');
            const fileInput = document.forms["myForm"]["profilePicture"].value;
            const errorMessage = document.getElementById("error-message");

            errorMessage.textContent = ''; // Reiniciar mensaje de error

            // Validaciones
            if (!nombre) {
                errorMessage.textContent = 'Por favor, ingresa tu nombre.';
                return false;
            }
            if (!email) {
                errorMessage.textContent = 'Por favor, ingresa tu correo electrónico.';
                return false;
            }
            if (!password) {
                errorMessage.textContent = 'Por favor, ingresa tu contraseña.';
                return false;
            }
            if (!tipoMipyme) {
                errorMessage.textContent = 'Por favor, selecciona un tipo de mipyme.';
                return false;
            }
            if (!fileInput) {
                errorMessage.textContent = 'Por favor, selecciona una foto de perfil.';
                return false;
            }

            // Validación del formato del email
            const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!email.match(emailPattern)) {
                errorMessage.textContent = 'Por favor, ingresa un correo electrónico válido.';
                return false;
            }

            return true; // El formulario es válido
        }
    </script>
</head>

<body>
    <div class="main-container">
        <div class="container">
        <div class="overlay"></div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-container">
                        <h2>REGISTRARSE</h2> <!-- <form class="form-horizontal" id="myForm" action="src/backend/signup.php" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data"> -->
                            
                            <form class="form-horizontal" id="myForm" action="src/backend/signup.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                        
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="nombre" placeholder="Nombre y Apellido" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" id="email" name="email" placeholder="Correo Electrónico" required>
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                                <label style="display: inline-flex; align-items: center;">
                                    Foto de Perfil
                                    <img id="profileIcon" src="src/Iconos/profile.png" alt="Subir foto" style="margin-left: 10px; width: 40px; height: 40px; border-radius: 50%; filter: grayscale(100%);">
                                    <input type="file" name="profilePicture" accept="image/*" class="custom-file-input" id="profilePicture" onchange="updateLabel()" style="display: none;">
                                </label>
                                <span id="error-message" style="color: red;"></span>
                            </div>
                            <div class="form-group">
                                <label>Tipo de Mipyme:</label>
                                <div style="display: flex; gap: 10px; margin-top: 5px;">
                                    <label>
                                        <input type="radio" name="tipo_mipyme" value="Pequeña" required>
                                        Pequeña
                                    </label>
                                    <label>
                                        <input type="radio" name="tipo_mipyme" value="Mediana" required>
                                        Mediana
                                    </label>
                                    <label>
                                        <input type="radio" name="tipo_mipyme" value="Grande" required>
                                        Grande
                                    </label>
                                    <!-- Agrega más opciones según sea necesario -->
                                </div>
                                <span id="error-message" style="color: red;"></span>
                                <!-- Mostrar mensaje de error si existe -->
                        <?php if (isset($_GET['error'])): ?>
                        <p style="color: red;"><?= htmlspecialchars($_GET['error']) ?></p>
                    <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-default">Crear</button> <!-- Cambiado a tipo submit -->
                            <div class="signup-link">
                                <p>Ya tengo una cuenta <a href="loginview.php" style="color: blue;">Iniciar sesión</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
