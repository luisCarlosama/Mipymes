
//style ventana de login y signup
function validateEmail() {
    const email = document.getElementById("email").value;
    const errorMessage= document.getElementById("error-messge");
    const gmailRegex =/^[a-zA-Z0-9._%+-]+gmail\.com$/;
    if (!gmailRegex.test(email)) {
        errorMessage.textContent = "Correo electronico invalido";
        return false;
    }
    errorMessage.textContent="";
    return true;
}
//style ventana de index,php
window.addEventListener('scroll', function() {
    const scrollPosition = window.pageYOffset;
    const background = document.querySelector('.background-image');
    
    // Mueve la imagen hacia la izquierda dependiendo del scroll
    background.style.transform = 'translateX(' + (-scrollPosition * 0.5) + 'px)';
});
//style ventana de homeview.php
document.querySelector('.like-button').addEventListener('click', function() {
    let heartIcon = this.querySelector('i');
    
    // Cambiar entre los íconos de corazón vacío y lleno
    heartIcon.classList.toggle('fas'); // Icono relleno
    heartIcon.classList.toggle('far'); // Icono vacío
    heartIcon.classList.toggle('liked'); // Clase que cambia el color a rojo
});
