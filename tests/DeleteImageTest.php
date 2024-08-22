<?php
use PHPUnit\Framework\TestCase;

class DeleteImageTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        include 'db.php';
        $this->conn = $conn;

        // Inserta una imagen de prueba para eliminar
        $sql = "INSERT INTO imagenes (titulo, ruta_imagen) VALUES ('Eliminar Imagen', 'uploads/delete_image.jpg')";
        $this->conn->query($sql);
    }

    public function testDeleteImage()
    {
        // Encuentra la imagen insertada para eliminar
        $sql = "SELECT id FROM imagenes WHERE titulo='Eliminar Imagen'";
        $result = $this->conn->query($sql);
        $image = $result->fetch_assoc();

        // Elimina la imagen
        $sql = "DELETE FROM imagenes WHERE id=" . $image['id'];
        $result = $this->conn->query($sql);

        // Verifica que la eliminación fue exitosa
        $this->assertTrue($result, "La eliminación de la imagen debería ser exitosa.");

        // Verifica que la imagen no esté en la base de datos
        $sql = "SELECT * FROM imagenes WHERE id=" . $image['id'];
        $result = $this->conn->query($sql);
        $this->assertEquals(0, $result->num_rows, "La imagen no debería existir en la base de datos.");
    }

    protected function tearDown(): void
    {
        // Limpieza por si acaso
        $this->conn->query("DELETE FROM imagenes WHERE titulo='Eliminar Imagen'");
    }
}
