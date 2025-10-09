<?php
class Empleado
{
    // Propiedades
    private String $nombre;
    private String $apellidos;
    private int $sueldo;

    // Constructor parametrizado
    public function __construct(String $nombre, String $apellidos, int $sueldo)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }

    // Getters y Setters
    public function setNombre(String $nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre(): String
    {
        return $this->nombre;
    }

    public function setApellidos(String $apell)
    {
        $this->apellidos = $apell;
    }
    public function getApellidos(): String
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

    // Métodos
    // Método que devuele String
    public function getNombreCompleto(): String
    {
        return $this->nombre . " " . $this->apellidos;
    }

    // Método que devuelve booelano
    public function debePagarImpuestos(): bool
    {
        return $this->sueldo > 3333;
    }
}
$persona = new Empleado("Javier", "Fernández Huidobro", 1200);
echo $persona->getNombreCompleto();
if ($persona->debePagarImpuestos() == true) {
    echo "<br>Debe pagar impuestos";
} else {
    echo "<br>No debe pagar impuestos";
}
