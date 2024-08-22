// Custom cursor
document.addEventListener('mousemove', function (e) {
    const cursor = document.getElementById('custom-cursor');
    const cursorOutline = document.getElementById('custom-cursor-outline');
    const x = e.clientX;
    const y = e.clientY;
    cursor.style.transform = `translate(${x - 10}px, ${y - 10}px)`; // Ajusta la posición del círculo pequeño
    cursorOutline.style.transform = `translate(${x - 20}px, ${y - 20}px)`; // Ajusta la posición de la circunferencia
});