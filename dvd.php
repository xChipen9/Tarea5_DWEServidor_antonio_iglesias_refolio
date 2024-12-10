<?php

namespace Dwes\ProyectoVideoclub;



class Dvd extends Soporte {
    private string $idioma;
    private string $formatoPantalla;

    public function __construct(string $titulo, int $numProducto, float $precio, string $idioma, string $formatoPantalla) {
        parent::__construct($titulo, $numProducto, $precio);
        $this->idioma = $idioma;
        $this->formatoPantalla = $formatoPantalla;
    }

    public function muestraResumen(): string {
        return "DVD: {$this->titulo}, ID: {$this->numProducto}, Precio: {$this->precio}€, Idioma: {$this->idioma}, Formato: {$this->formatoPantalla}";
    }
}

