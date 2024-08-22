<?php
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnection()
    {
        include 'db.php'; // Incluye el archivo de conexión

        // Verifica que la conexión no sea null
        $this->assertNotNull($conn, "La conexión a la base de datos debe estar establecida.");

        // Verifica que no haya errores de conexión
        $this->assertFalse($conn->connect_error, "No debe haber errores en la conexión a la base de datos.");
    }
}
