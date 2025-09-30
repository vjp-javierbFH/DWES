<?php

class Persona
{
    private string $nombre;
    private string $apellidos;
    public function __construct(string $nombre, string $apellidos)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function mostrarDatos(): string
    {
        return "Nombre: " . $this->nombre . " y Apellidos: " . $this->apellidos;
    }
}

class Empleado extends Persona
{
    // Variable estática para el sueldo tope
    private static int $sueldoTope = 3333;

    // Propiedades promovidas en el constructor (PHP 8)
    public array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, int $sueldo)
    {
        parent::__construct($nombre, $apellidos);
        $this->sueldo = $sueldo;
    }

    // Métodos estáticos para acceder y modificar sueldoTope
    public static function getSueldoTope(): int
    {
        return self::$sueldoTope;
    }

    public static function setSueldoTope(int $nuevoTope): void
    {
        self::$sueldoTope = $nuevoTope;
    }

    // Getters (ya no hay setters para nombre y apellidos)
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setSueldo(int $sueldo)
    {
        $this->sueldo = $sueldo;
    }
    public function getSueldo(): int
    {
        return $this->sueldo;
    }

    public function getTelefonos(): array
    {
        return $this->telefonos;
    }

    public function setTelefonos(array $telefonos)
    {
        $this->telefonos = $telefonos;
        return $this;
    }

    public function getNombreCompleto(): string
    {
        return $this->nombre . " " . $this->apellidos;
    }

    public function debePagarImpuestos(): bool
    {
        return $this->sueldo > self::$sueldoTope;
    }

    public function anyadirTelefono(int $telefono): void
    {
        if (!in_array($telefono, $this->telefonos)) {
            $this->telefonos[] = $telefono;
        }
    }

    public function listarTelefonos(): string
    {
        return implode(", ", $this->telefonos);
    }

    public function vaciarTelefonos(): void
    {
        $this->telefonos = [];
    }

    public function mostrarDatos(): string
    {
        return parent::mostrarDatos() . ". Sueldo: " . $this->sueldo . " y Teléfonos: " . implode(", ", $this->telefonos);
    }

    // public static function toHtml(Empleado $emp): string
    // {
    //     return "<p>Nombre: " . $emp->getNombre() . "<br>Apellidos: " . $emp->getApellidos() . "<br>Sueldo: " . $emp->getSueldo() . "<br>Teléfonos: " . implode(", ", $emp->getTelefonos()) . "</p>";
    // }
}

$emp = new Empleado("Juan", "Pérez", 3500);
$emp->anyadirTelefono(123456789);
$emp->anyadirTelefono(987654321);
echo $emp->mostrarDatos();