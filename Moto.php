<?php

//Realizamos la implementacion de la clase Moto.

class Moto{

    //código, costo, año fabricación, descripción, porcentaje incremento anual,
    // activa (atributo que va a contener un valor true,  si la moto está  disponible para la venta  y false en caso contrario).


    private $codigo;
    
    private $costo;
    
    private $anioFabricacion;
    
    private $descripcion;
    
    private $porcentIncrementoAnual;
    
    private $activa;
    
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentIncrementoAnual, $activa){
        //Creamos el constructor de la clase Moto.

        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentIncrementoAnual = $porcentIncrementoAnual;
        $this->activa = $activa;
    }

    //IMplementamos los metodos de acceso get y set para cada atributo.

    public function getCodigo(){
        return $this->codigo; 
    }
    
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }



    public function getCosto(){
        return $this->costo; 
    }

    public function setCosto($costo){
        $this->costo = $costo;
    }



    public function getAnioFabricacion(){
        return $this->anioFabricacion; 
    }
    
    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion = $anioFabricacion;
    }



    public function getDescripcion(){
        return $this->descripcion; 
    }
    
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }



    public function getPorcentIncrementoAnual(){
        return $this->porcentIncrementoAnual; 
    }
    
    public function setPorcentIncrementoAnual($porcentIncrementoAnual){
        $this->porcentIncrementoAnual = $porcentIncrementoAnual;
    }



    public function getActiva(){
        return $this->activa;
    }

    public function setActiva($activa){
        $this->activa = $activa;
    }


    //Este metodo pasa a string el valor del atributo $activa, para poder mostrarlo.
    public function actividadMoto(){
        $activa = $this->getActiva();
        if ($activa){
            $actividad = "La moto esta activa para la venta.";
        }else {
            $actividad = "La moto no esta disponible para su venta.";
        }
        return $actividad;
    }


    //Implementamos el metodo to string para visualizar todos los atributos de la clase.
    public function __toString(){
        return(
            "\nCodigo: " . $this->getCodigo() . 
            "\nCosto: " . $this->getCosto() .
            "\nAño de fabricacion: " . $this->getAnioFabricacion() . 
            "\nDescripcion: " . $this->getDescripcion() . 
            "\nPorcentaje de incremento anual: " . $this->getPorcentIncrementoAnual() . 
            "\nActividad de la moto: " . $this->actividadMoto() . "\n"
        );
    }

    

    /**
    * Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
    *  Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el siguiente cálculo: 
    *   $_venta = $_compra + $_compra * (anio * por_inc_anual) 
    *  donde  $_compra:  es el costo de la moto.
    * anio: cantidad de años transcurridos desde que se fabricó  la moto.
    * por_inc_anual:  porcentaje de incremento anual de la moto.
    *
    */
    public function darPrecioVenta(){
        $_venta = null;
        $costo = $this->getCosto();
        $porcentIncrementoAnual = $this->getPorcentIncrementoAnual();
        $activa = $this->getActiva();
        $anioFabricacion = $this->getAnioFabricacion();
        $anio = 2023 - $anioFabricacion;

        if ($activa){
            $_venta = $costo + $costo * ($anio * $porcentIncrementoAnual); 
        }else {
            $_venta = 0;
        }
        return $_venta;
    }
}