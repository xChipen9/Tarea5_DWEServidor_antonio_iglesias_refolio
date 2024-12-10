<?php

namespace Dwes\ProyectoVideoclub;

use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;

class Cliente {
    private string $nombre;
    private int $numero;
    private int $maxAlquilerConcurrente;
    private array $soportesAlquilados = [];

    public function __construct(string $nombre, int $numero, int $maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function alquilar(Soporte $soporte): self {
        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            throw new CupoSuperadoException("El cliente ha alcanzado el limite de alquileres.");
        }

        if ($soporte->alquilado) {
            throw new SoporteYaAlquiladoException("Este soporte ya esta alquilado.");
        }

        $soporte->alquilado = true;
        $this->soportesAlquilados[] = $soporte;

        return $this;
    }

    public function devolver(Soporte $soporte): self {
        $clave = array_search($soporte, $this->soportesAlquilados, true);

        if ($clave === false) {
            throw new SoporteNoEncontradoException("El soporte no esta alquilado por este cliente.");
        }

        unset($this->soportesAlquilados[$clave]);
        $soporte->alquilado = false;

        return $this;
    }
}