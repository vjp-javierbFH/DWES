<?php
namespace ejercicios\nameSpace;

const PI = 3.14;

class Circulo
{
    public float $radio;

    public function __construct(float $radio)
    {
        $this->radio = $radio;
    }

    public function area(): float
    {
        return PI * ($this->radio ** 2);
    }
}
