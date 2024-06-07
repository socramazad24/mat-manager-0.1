<?php
use PHPUnit\Framework\TestCase;


include_once ('../src/pruebaUsuarios.php'); // Reemplaza con la ruta correcta

class RegistroUsuarioTest extends TestCase {
    private $op;
    public function setup(): void
    {
        $this->op = new UsersTests();
    }
    // Prueba para verificar el registro de usuario exitoso
    public function testRegistroUsuarioExitoso() {
        $conexionMock = $this->createMock(mysqli::class);
        $conexionMock->method('query')->willReturn(true);

        $mensaje = registrarUsuario('123', 'John', 'Doe', 'johndoe', '1234', 'john@example.com', '123456789', 'administrador', $conexionMock);

        $this->assertEquals('te has registrado exitosamente', $mensaje);
    }

    // Prueba para verificar si el usuario ya existe
    public function testUsuarioExistente() {
        $conexionMock = $this->createMock(mysqli::class);
        $conexionMock->method('query')->willReturn(true);

        $mensaje = registrarUsuario('123', 'John', 'Doe', 'usuario_existente', 'contraseña', 'john@example.com', '123456789', 'administrador', $conexionMock);

        $this->assertEquals('El usuario ya existe. Por favor, elige otro nombre de usuario.', $mensaje);
    }

    // Prueba para verificar el caso de campos faltantes
    public function testCamposFaltantes() {
        $conexionMock = $this->createMock(mysqli::class);

        $mensaje = registrarUsuario('', '', '', '', '', '', '', '', $conexionMock);

        $this->assertEquals('llene todos los campos', $mensaje);
    }
}
?>
