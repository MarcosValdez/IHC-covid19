const hamburger = document.getElementById('hamburger');
const nav = document.getElementById('nav-ul');

hamburger.addEventListener('click', () => {
    nav.classList.toggle('show');
})

const btn = document.getElementById('btn');
const mensaje = document.getElementById('mensaje');
btn.addEventListener('click', () => {
    mensaje.classList.toggle('cerrar');
})