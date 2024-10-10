<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link rel="stylesheet" href="stylesLogin.css">
</head>

<body>
    <div class="main-container">
        <div class="overlay"></div> <!-- Capa oscura sobre el fondo -->
        <div class="form-container">
            <!-- Icono de Usuario -->
            <h2> INICIAR SESIÓN </h2>

            <!-- Formulario de Inicio de Sesión -->
            <form class="form-horizontal" action="src/backend/login.php" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email address" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-default">Acceder</button>
            </form>
            <!-- Mensaje de error -->
            <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">
                <?= htmlspecialchars($_GET['error']) ?>
            </p>
            <?php endif; ?>

            <div class="signup-link">
                <p>¿No tienes una cuenta? <a href="signupview.php" style="color: blue;">Crear una cuenta</a></p>
            </div>
        </div>
    </div>
    <script src="style.js"></script>
</body>

</html>
