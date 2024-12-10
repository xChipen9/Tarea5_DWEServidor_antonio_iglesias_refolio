<?php

namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;

class Videoclub {
    private string $nombre;
    private array $productos = [];
    private array $socios = [];
    private int $contadorProductos = 0;
    private int $contadorSocios = 0;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void {
        $this->productos[++$this->contadorProductos] = new CintaVideo($titulo, $this->contadorProductos, $precio, $duracion);
    }

    public function incluirDvd(string $titulo, float $precio, string $idioma, string $formatoPantalla): void {
        $this->productos[++$this->contadorProductos] = new Dvd($titulo, $this->contadorProductos, $precio, $idioma, $formatoPantalla);
    }

    public function incluirJuego(string $titulo, float $precio, string $plataforma, int $minJugadores, int $maxJugadores): void {
        $this->productos[++$this->contadorProductos] = new Juego($titulo, $this->contadorProductos, $precio, $plataforma, $minJugadores, $maxJugadores);
    }

    public function agregarSocio(Cliente $cliente): void {
        $this->socios[++$this->contadorSocios] = $cliente;
    }

    public function alquilarSocioProductos(int $numSocio, array $numerosProductos): void {
        if (!isset($this->socios[$numSocio])) {
            throw new ClienteNoEncontradoException("Socio no encontrado.");
        }

        $socio = $this->socios[$numSocio];

        foreach ($numerosProductos as $numProducto) {
            if (!isset($this->productos[$numProducto])) {
                throw new SoporteYaAlquiladoException("Producto no disponible.");
            }

            $socio->alquilar($this->productos[$numProducto]);
        }
    }
}
