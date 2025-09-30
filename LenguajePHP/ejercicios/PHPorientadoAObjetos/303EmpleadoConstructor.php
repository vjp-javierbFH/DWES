<?php

class Empleado
{
    private $nombre;
    private $apellidos;
    private $sueldo;

    public function __construct(string $nombre, string $apellidos, float $sueldo = 1000)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }

    // Eliminar los setters de nombre y apellidos

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    public function setSueldo(float $sueldo)
    {
        $this->sueldo = $sueldo;
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
echo "Mostrando lista de teléfonos" . $persona->listarTelefonos() . "<br>";