<?php

use PHPUnit\Framework\TestCase;
use users\users;
use Database\Database;

class TestUser extends TestCase
{
    private $registerUser;
    private $dbMock;

    protected function setUp(): void
    {
        // Crear un mock de la clase Database
        $this->dbMock = $this->createMock(Database::class);
        
        // Crear una instancia de la clase RegisterUserClass
        $this->registerUser = new users();
    }

    public function testRegisterUserWithValidData()
    {
        $_POST = [
            'idEmployee' => '123456',
            'firstName' => 'Juan',
            'lastName' => 'Pérez',
            'username' => 'juanperez',
            'password' => 'securepassword',
            'password_confirmation' => 'securepassword',
            'email' => 'juan@example.com',
            'phone' => '1234567890',
            'role' => 'administrador'
        ];

        // Simular el método insertar
        $this->dbMock->expects($this->once())
                     ->method('query')
                     ->with($this->stringContains("INSERT INTO users"))
                     ->willReturn(true);

        // Capturar la salida
        ob_start();
        $this->registerUser->processRegistration();
        $output = ob_get_clean();
        
        // Verificar que la salida contiene el mensaje de éxito
        $this->assertStringContainsString('Te has registrado exitosamente.', $output);
    }

    public function testRegisterUserWithEmptyFields()
    {
        $_POST = [
            'idEmployee' => '',
            'firstName' => '',
            'lastName' => '',
            'username' => '',
            'password' => '',
            'password_confirmation' => '',
            'email' => '',
            'phone' => '',
            'role' => ''
        ];

        // Capturar la salida
        ob_start();
        $this->registerUser->RegisterUserF();
        $output = ob_get_clean();

        // Verificar que la salida contiene el mensaje de error
        $this->assertStringContainsString('Por favor, complete todos los campos.', $output);
    }

    public function testRegisterUserWithInvalidEmail()
    {
        $_POST = [
            'idEmployee' => '123456',
            'firstName' => 'Juan',
            'lastName' => 'Pérez',
            'username' => 'juanperez',
            'password' => 'securepassword',
            'password_confirmation' => 'securepassword',
            'email' => 'invalidemail',
            'phone' => '1234567890',
            'role' => 'administrador'
        ];

        // Capturar la salida
        ob_start();
        $this->registerUser->RegisterUserF();
        $output = ob_get_clean();

        // Verificar que la salida contiene el mensaje de error
        $this->assertStringContainsString('Por favor, introduzca un correo electrónico válido.', $output);
    }
}
