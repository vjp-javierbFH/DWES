<?php

class Persona
{
    private string $nombre;
    private string $apellidos;
    private int $edad;
    public function __construct(string $nombre, string $apellidos, int $edad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
            
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    function public __toString() : string
    {
        return "Nombre: " . $this->nombre . "<br>Apellidos: " . $this->apellidos . "<br>Edad: " . $this->edad;
    }
}

class Empleado extends Persona
{
    // Variable estática para el sueldo tope
    private static int $sueldoTope = 3333;

    // Propiedades promovidas en el constructor (PHP 8)
    public array $telefonos = [];

    public function __construct(string $nombre, string $apellidos, int $edad, int $sueldo)
    {
        parent::__construct($nombre, $apellidos, $edad);
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
        return parent::getEdad() > 21 && $this->sueldo > self::$sueldoTope;
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

    function public __toString(): string
    {
        return $str;
    }
}

$emp = new Empleado("Javier", "Fernández", 20, 3500);
$emp->anyadirTelefono(123456789);
$emp->anyadirTelefono(987654321);
echo $emp;
