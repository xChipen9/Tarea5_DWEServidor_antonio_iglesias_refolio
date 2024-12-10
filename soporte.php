<?php

namespace Dwes\ProyectoVideoclub;

abstract class Soporte {
    public string $titulo;
    public int $numProducto;
    protected float $precio;
    public bool $alquilado = false;

    public function __construct(string $titulo, int $numProducto, float $precio) {
        $this->titulo = $titulo;
        $this->numProducto = $numProducto;
        $this->precio = $precio;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getPrecioConIVA(): float {
        return $this->precio * 1.21;
    }

    abstract public function muestraResumen(): string;
}
