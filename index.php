<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starpy</title>
    <link rel="stylesheet" href="stylesindex.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="src/Iconos/logomypime.png" alt="Logo de Starpy">
            <img src="src/Iconos/logomypime1.png" alt="Logo de Starpy">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="/mipymes/index.php">Inicio</a></li>
                <li><a href="/mipymes/loginview.php">Mensajes</a></li>
                <li><a href="/mipymes/loginview.php">Notificaciones</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <div class="container">
        <div class="overlay"></div>
            <div class="background-image"></div>
            <section class="main-content">
                <h1>¡BIENVENIDO A STARPY!</h1>
                <p>Aquí en Starpy, conecta tu MIPYME con grandes empresas y descubre nuevas oportunidades
                 para expandir tu negocio. Potencia tu visibilidad, mejora tu reconocimiento y asegura 
                 una financiación sólida para llevar tu emprendimiento al siguiente nivel.
                </p>
                <a href="loginview.php" class="boxed-btn4">Iniciar sesión</a>

                <!-- Botones de contacto -->
                <div class="store-buttons">
                    <a href="tel:+123456789" class="contact-icon phone-icon">
                        <img src="src/Iconos/telefono1.png" alt="Comunicación-Teléfono">
                    </a>
                    <a href="mailto:juegostripp@gmail.com" class="contact-icon email-icon">
                        <img src="src/Iconos/gmail1.png" alt="Comunicacion-Gmail">
                    </a>
                    
                </div>
            </section>
        </div>
    </main>

    <section class="interactive-section">
        <div class="mipymes">
            <img src="src/Imagenes/creacion.png" alt="Emprendedor 1">
            <div class="description">
                <h3>Emprendedor 1</h3>
                <p>Descripción</p>
            </div>
        </div>
        <div class="mipymes">
            <img src="src/Imagenes/creacion.png" alt="Emprendedor 2">
            <div class="description">
                <h3>Emprendedor 2</h3>
                <p>Descripción</p>
            </div>
        </div>
        <div class="mipymes">
            <img src="src/Imagenes/creacion.png" alt="Emprendedor 3">
            <div class="description">
                <h3>Emprendedor 3</h3>
                <p>Descripción</p>
            </div>
        </div>
        <div class="mipymes">
            <img src="src/Imagenes/creacion.png" alt="Emprendedor 4">
            <div class="description">
                <h3>Emprendedor 4</h3>
                <p>Descripción</p>
            </div>
        </div>
    </section>
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
