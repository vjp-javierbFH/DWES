<?php
class Empleado
{
    // Propiedades
    private String $nombre;
    private String $apellidos;
    private int $sueldo;
    public array $telefonos = [];

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

    /**
     * Get the value of telefonos
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }

    /**
     * Set the value of telefonos
     *
     * @return  self
     */
    public function setTelefonos($telefonos)
    {
        $this->telefonos = $telefonos;

        return $this;
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

    // Método para añadir un nº de tlfno al array
    public function anyadirTelefono(int $telefono): void
    {
        // Comprobar si el valor existe en el array
        if (!in_array($telefono, $this->telefonos)) {
            $this->telefonos[] = $telefono;
        }
    }

    // Método para mostrar una lista de números
    public function listarTelefonos(): string
    {
        return implode(", ", $this->telefonos);
    }

    // Método para vaciar el array
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
echo "Mostrando lista de teléfonos" . $persona->listarTelefonos() . "<br>";