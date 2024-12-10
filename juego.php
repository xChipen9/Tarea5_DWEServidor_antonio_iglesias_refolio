<?php

namespace Dwes\ProyectoVideoclub;



class Juego extends Soporte {
    private string $plataforma;
    private int $minJugadores;
    private int $maxJugadores;

    public function __construct(string $titulo, int $numProducto, float $precio, string $plataforma, int $minJugadores, int $maxJugadores) {
        parent::__construct($titulo, $numProducto, $precio);
        $this->plataforma = $plataforma;
        $this->minJugadores = $minJugadores;
        $this->maxJugadores = $maxJugadores;
    }

    public function muestraResumen(): string {
        return "Juego: {$this->titulo}, ID: {$this->numProducto}, Precio: {$this->precio}€, Plataforma: {$this->plataforma}, Jugadores: {$this->minJugadores}-{$this->maxJugadores}";
    }
}
