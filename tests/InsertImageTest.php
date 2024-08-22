<?php
use PHPUnit\Framework\TestCase;

class InsertImageTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        include 'db.php';
        $this->conn = $conn;
    }

    public function testInsertImage()
    {
        $titulo = "Imagen de Prueba";
        $ruta_imagen = "uploads/test_image.jpg";

        $sql = "INSERT INTO imagenes (titulo, ruta_imagen) VALUES ('$titulo', '$ruta_imagen')";
        $result = $this->conn->query($sql);

        // Verifica que la consulta se ejecutó correctamente
        $this->assertTrue($result, "La inserción de la imagen debería ser exitosa.");

        // Verifica que la imagen esté en la base de datos
        $last_id = $this->conn->insert_id;
        $sql = "SELECT * FROM imagenes WHERE id=$last_id";
        $result = $this->conn->query($sql);
        $image = $result->fetch_assoc();

        $this->assertEquals($titulo, $image['titulo'], "El título de la imagen debe coincidir.");
        $this->assertEquals($ruta_imagen, $image['ruta_imagen'], "La ruta de la imagen debe coincidir.");
    }

    protected function tearDown(): void
    {
        // Limpia la base de datos después de la prueba
        $this->conn->query("DELETE FROM imagenes WHERE titulo='Imagen de Prueba'");
    }
}
