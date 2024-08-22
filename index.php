<?php
include 'db.php';

$sql = "SELECT * FROM imagenes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mis Imágenes Favoritas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/marquee.css">
</head>

<body class="index bg-gradient">


    <h1 class="title">Favorit@s</h1>

    <a class="add-btn" href="add.php">Añadir Nueva Imagen</a>

    <div class="gallery">
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>

                <div class="gallery__item">
                    <a href="<?php echo $row['ruta_imagen']; ?>" target="_blank" class="gallery__item__img custom-cursor" style="background-image: url(<?= $row['ruta_imagen']; ?>);">
                    </a>

                    <div class="gallery__item__foot">

                        <p class="gallery__item__title custom-cursor"><?php echo $row['titulo']; ?></p>

                        <div class="gallery__item__foot__buttons">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="gallery__item__foot__buttons__item">
                                <img src="assets/icons/edit.svg" alt="Icono de editar">
                            </a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta imagen?');" class="gallery__item__foot__buttons__item gallery__item__foot__buttons__item--delete">
                                <img src="assets/icons/delete.svg" alt="Icono de borrar">
                            </a>
                        </div>


                    </div>

                </div>

            <?php endwhile; ?>
        <?php else : ?>
            <p>No hay imágenes aún.</p>
        <?php endif; ?>



    </div>




    <div class="marquee-container">
        <div class="marquee marquee-left"></div>
        <div class="link-container">
            <a href="add.php" class="solicitar-demo">
                <span>
                    Añadir imagen
                </span>
                <img src="assets/icons/arrow.png" alt="Flecha">
            </a>
        </div>
        <div class="marquee marquee-right"></div>
    </div>

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


</body>



</html>

<?php $conn->close(); ?>