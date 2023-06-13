<?php

//Realizamos la implementacion de la clase Venta.

class Venta{

    //número, fecha, referencia al cliente, referencia a una colección de motos y el precio final

    private $numero;

    private $fecha;

    private $objCliente;

    private $colMotos;

    private $precioFinal;

    

    public function __construct($numero, $fecha, $objCliente, $colMotos){
        //Realizamos la creacion del metodo constructor de la clase Venta.

        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colMotos = $colMotos;
    }


    //Realizamos la creacion de los metodos de acceso get y set.

    
    public function getNumero(){
        return $this->numero; 
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }



    public function getObjCliente(){
        return $this->objCliente; 
    }

    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }



    public function getColMotos(){
        return $this->colMotos; 
    }

    public function setColMotos($colMotos){
        $this->colMotos = $colMotos;
    }



    public function getPrecioFinal(){
        return $this->precioFinal; 
    }

    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }


    
    public function mostrarColMotos(){
        $colMotos = $this->getColMotos();
        $cadena = "";
        $indice = 0;
        foreach ($colMotos as $moto){
            $cadena = $cadena . "\n\nMoto nro: " . $indice + 1;
            $cadena = $cadena . "\nCodigo: " . $moto->getCodigo();
            $cadena = $cadena . "\nCosto: " . $moto->getCosto();
            $cadena = $cadena . "\nAño de fabricacion: " . $moto->getAnioFabricacion();
            $cadena = $cadena . "\nDescripcion: " . $moto->getDescripcion();
            $cadena = $cadena . "\nPorcentaje de incremento anual: " . $moto->getPorcentIncrementoAnual();
            $cadena = $cadena . "\nActividad de la moto: " . $moto->actividadMoto();
            $indice++;
        }
        return $cadena;
    }


    public function __toString(){
        return (
            "\nNumero de venta: " . $this->getNumero() . 
            "\nFecha: " . $this->getFecha() .
            "\nCliente: " . $this->getObjCliente() . 
            "\n\nMotos: " . $this->mostrarColMotos() . 
            "\n\nPrecio final: " . $this->getPrecioFinal()
        );
    }


    public function incorporarMoto($objMoto){
        $exito = false;
        if ($objMoto !== null){
            $colMotos = $this->getColMotos();
            $actividad = $objMoto->getActiva();
            $precioFinal = $this->getPrecioFinal();
            $costo = $objMoto->darPrecioVenta();
            if ($actividad){
                array_push($colMotos, $objMoto);
                $precioFinal = $precioFinal + $costo;
                $this->setPrecioFinal($precioFinal);
                $this->setColMotos($colMotos);
                $exito = true;    
            }
        }
        return $exito;
    }

}