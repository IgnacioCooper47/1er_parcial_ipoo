<?php

//Realizamos la implementacion de la clase Cliente.

class Cliente{

    // nombre, apellido, si está o no dado de baja, el tipo y el número de documento

    private $nombre;

    private $apellido;

    private $estado;

    private $tipoDoc;

    private $numDocumento;

    public function __construct($nombre, $apellido, $estado, $tipoDoc, $numDocumento){
        //Creamos el constructor de la clase cliente.

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->tipoDoc = $tipoDoc;
        $this->numDocumento = $numDocumento;
    }

    //implementamos los metodos de acceso get y set.
    
    public function getNombre(){
        return $this->nombre; 
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }



    public function getApeliido(){
        return $this->apellido; 
    }
    
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }



    public function getEstado(){
        return $this->estado; 
    }
    
    public function setEstado($estado){
        $this->estado = $estado;
    }
    


    public function getTipoDoc(){
        return $this->tipoDoc; 
    }
    
    public function setTipoDoc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }



    public function getNumDocumento(){
        return $this->numDocumento; 
    }
    
    public function setNumDocumento($numDocumento){
        $this->numDocumento = $numDocumento;
    }


    //Implementacion de metodo to sttring para visualizar toda la informacion de la clase.
    public function __toString(){
        return ("\nNombre: " . $this->getNombre() . 
                "\nApellido: " . $this->getApeliido() .
                "\nEstado: " . $this->getEstado() . 
                "\nTipo de documento: " . $this->getTipoDoc() . 
                "\nNumero de documento: " . $this->getNumDocumento()
        );
    }
}