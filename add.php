<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $ruta_imagen = 'uploads/' . basename($_FILES['imagen']['name']);

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
        $sql = "INSERT INTO imagenes (titulo, ruta_imagen) VALUES ('$titulo', '$ruta_imagen')";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Imagen</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gradient add">

    <a href="index.php">
        <h1 class="title">
            Favorit@s
        </h1>
    </a>

    <div class="add-main">
        <h2 class="title">Añadir <strong>Nueva</strong> <br />Imagen</h1>
            
        <form class="add-main__form" action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-group form-group--title">
                <label for="titulo" id="label-titulo">Título</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group form-group--file">
                <!-- <label for="imagen">Selecciona una imagen:</label> -->
                <input type="file" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <button type="submit">Añadir Imagen</button>
        </form>

    </div>

    <a class="add-btn add-btn--add" href="index.php">
        <img src="assets/icons/arrow.png" alt="Flechita" class="arrow">
        Volver a la lista
    </a>

    <footer class="footer">
        <p class="footer__text">
            © Design & Devellop by
            <a class="footer__text__link" href="https://es.linkedin.com/in/julio-arresa" target="_blank">
                <span>
                    Julio Arresa
                </span>
            </a>
            for
            <a class="footer__text__link" href="https://factoriaf5.org/" target="_blank">
                <img class="footer__text__link__image" src="assets/logo-footer.png" alt="Logo Factoría F5">
            </a>
        </p>
    </footer>

    <div class="custom-cursor" id="custom-cursor"></div>

    <script src="js/add.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>