<?php
// tests/UserRegistrationTest.php

use PHPUnit\Framework\TestCase;

require_once 'user_registration.php';

class UserRegistrationTest extends TestCase
{
    // Simulamos una conexión ficticia
    private $conex;

    // Método que se ejecuta antes de cada prueba
    protected function setUp(): void
    {
        $this->conex = $this->createMock(mysqli::class);
    }

    public function testRegisterUserSuccess()
    {
        // Configurar el objeto de conexión ficticia para devolver un resultado ficticio
        $this->conex->method('query')
            ->willReturn(true);

        $userRegistration = new UserRegistration($this->conex);
        $result = $userRegistration->registerUser('1', 'John', 'Doe', 'johndoe', 'password', 'john@example.com', '123456789', 'administrador');

        $this->assertEquals('te has registrado exitosamente', $result);
    }

    public function testRegisterUserAlreadyExists()
    {
        // Configurar el objeto de conexión ficticia para devolver un resultado ficticio
        $this->conex->method('query')
            ->willReturn($this->createMock(mysqli_result::class));

        $userRegistration = new UserRegistration($this->conex);
        $result = $userRegistration->registerUser('1', 'John', 'Doe', 'johndoe', 'password', 'john@example.com', '123456789', 'administrador');

        $this->assertEquals('El usuario ya existe. Por favor, elige otro nombre de usuario.', $result);
    }

    // Puedes escribir más pruebas para cubrir otros casos
}

?>
