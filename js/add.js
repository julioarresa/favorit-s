

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('titulo').addEventListener('focus', function() {
        document.getElementById('label-titulo').classList.toggle('label-focus');
    });
    document.getElementById('titulo').addEventListener('blur', function() {
        document.getElementById('label-titulo').classList.toggle('label-focus');
    });
});