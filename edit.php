<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM imagenes WHERE id=$id";
    $result = $conn->query($sql);
    $imagen = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $nueva_ruta_imagen = $imagen['ruta_imagen'];

    if (!empty($_FILES['imagen']['name'])) {
        $nueva_ruta_imagen = 'uploads/' . basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $nueva_ruta_imagen);
    }

    $sql = "UPDATE imagenes SET titulo='$titulo', ruta_imagen='$nueva_ruta_imagen' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Imagen</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gradient edit">

    <a href="index.php">
        <h1 class="title">
            Favorit@s
        </h1>
    </a>


    <div class="add-main">
        <h2 class="title"><strong>Editar</strong> <br />Imagen</h2>

        <form class="add-main__form" action="edit.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $imagen['id']; ?>">
            <div class="form-group form-group--title">
                <label for="titulo" class="label-focus">Título:</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $imagen['titulo']; ?>" required>
            </div>

            <div class="form-group form-group--file">
                <input type="file" id="imagen" name="imagen" accept="image/*">
            </div>

            <button type="submit">Guardar Cambios</button>

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
                Julio Arresa
            </a>
            for
            <a class="footer__text__link" href="https://factoriaf5.org/" target="_blank">
                <img class="footer__text__link__image" src="assets/logo-footer.png" alt="Logo Factoría F5">
            </a>
        </p>
    </footer>

    <div class="custom-cursor" id="custom-cursor"></div>
    <script src="js/custom.js"></script>
</body>

</html>