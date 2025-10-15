<?php
class Empleado
{
    // Constante para el sueldo tope
    public const SUELDO_TOPE = 3333;

    // Propiedades promovidas en el constructor (PHP 8)
    public array $telefonos = [];

    public function __construct(
        private string $nombre,
        private string $apellidos,
        private int $sueldo
    ) {}

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
        return $this->sueldo > self::SUELDO_TOPE;
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
}

$persona = new Empleado("Javier", "Fernández Huidobro", 1200);
echo $persona->getNombreCompleto();
if ($persona->debePagarImpuestos() == true) {
    echo "<br>Debe pagar impuestos";
} else {
    echo "<br>No debe pagar impuestos";
}
echo "Añadiendo números<br>";
$persona->anyadirTelefono(63093423);
$persona->anyadirTelefono(69843435);
$persona->anyadirTelefono(76452376);
echo "Mostrando lista de teléfonos" . $persona->listarTelefonos() . "<br>";
echo "Vaciando lista: " . $persona->vaciarTelefonos();
echo "Mostrando lista de teléfonos" . $persona;