<?php

include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";
include_once "Empresa.php";

echo "Bienvenido...";

$objCliente1 = new Cliente("Fausto", "Biló", 1, "dni", "44505523");
$objCliente2 = new Cliente("Ignacio", "Dvorachuk", 1, "dni", "23675234");

$colClientes = [$objCliente1, $objCliente2];

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new moto(13, 999900, 2023, "Zanella Patagonia Eagle 250", 55, false);

$colMotos= [$objMoto1, $objMoto2, $objMoto3];

$objEmpresa = new Empresa("Alta Gama", "Av argentina 123", $colClientes, $colMotos, []);


$colCodigosMoto1 = [11, 12];
$colCodigosMoto2 = [0];
$colCodigosMoto3 = [2];

echo "ejercicio 1 \n";
$j1 = $objEmpresa->registrarVenta($colCodigosMoto1, $objCliente2);
echo $j1;

echo "\n\n ejercicio 2";
$j2 = $objEmpresa->registrarVenta($colCodigosMoto2, $objCliente2);
echo $j2;

echo "\n\n ejercicio 3";
$j3 = $objEmpresa->registrarVenta($colCodigosMoto3, $objCliente2);
echo $j3;

echo "\n\n Ejercicio 4";
$j4 = $objEmpresa->retornarVentasXCliente("dni", "44505523");
print_r($j4);

echo "\n\n ejercicio 5";
$j5 = $objEmpresa->retornarVentasXCliente("dni", "23675234");
print_r($j5);


