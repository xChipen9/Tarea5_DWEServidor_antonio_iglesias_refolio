<?php

use Dwes\ProyectoVideoclub\Videoclub;
use Dwes\ProyectoVideoclub\Cliente;

require_once "../autoload.php";

$videoclub = new Videoclub("Videoclub Extremo");

$cliente1 = new Cliente("Antonio Iglesias", 1);
$cliente2 = new Cliente("Marcos Blazquez", 2);

$videoclub->agregarSocio($cliente1);
$videoclub->agregarSocio($cliente2);

$videoclub->incluirCintaVideo("Los Vengadores", 4.5, 90);
$videoclub->incluirDvd("Un Ciudadano Ejemplar", 12.0, "es,en,fr", "16:9");
$videoclub->incluirJuego("Call of Duty Black Ops 2", 60.0, "PlayStation", 1, 4);

$videoclub->alquilarSocioProductos(1, [1, 2]);

echo "Los productos han sido alquilados con exito.";
