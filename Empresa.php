<?php

//creacion de la clase Empresa.

class Empresa{
    
    //denominación, dirección, la colección de clientes, colección de motos y la colección de ventas realizadas.

    private $denominacion;
    
    private $direccion;

    private $colClientes;

    private $colMotos;

    private $colVentas;



    public function __construct($denominacion, $direccion, $colClientes, $colMotos, $colVentas){
        //creacion del metodo constructor de la clase Empresa.

        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colMotos = $colMotos;
        $this->colVentas = $colVentas;
    }


    //implementamos los metodos de acceso get y set.

    
    public function getDenominacion(){
        return $this->denominacion; 
    }

    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }



    public function getDireccion(){
        return $this->direccion; 
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }



    public function getColClientes(){
        return $this->colClientes; 
    }

    public function setColClientes($colClientes){
        $this->colClientes = $colClientes;
    }



    public function getColMotos(){
        return $this->colMotos; 
    }

    public function setColMotos($colMotos){
        $this->colMotos = $colMotos;
    }



    public function getColVentas(){
        return $this->colVentas; 
    }

    public function setColVentas($colVentas){
        $this->colVentas = $colVentas;
    }

    public function retornarMoto($codigoMoto){
        $colMotos = $this->getColMotos();
        $encontro = false;
        $motoEcontrada = null;
        $i = 0;
        while ($i<count($colMotos) && !$encontro){
            $moto = $colMotos[$i];
            if ($moto->getCodigo() == $codigoMoto){
                $motoEcontrada = $moto;
                $encontro = true;
            }
            $i++;
        }
        return ($motoEcontrada);
    }


    /**
     *  método que recibe por parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección se busca el objeto moto correspondiente al código y  se incorpora a la colección de motos de la instancia Venta que debe ser creada.
     *  Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado.                                                                     
     *  El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta. 
     */
    public function registrarVenta($colCodigosMoto, $objCliente){
        if ($objCliente->getEstado() == 1){
            $colVentas = $this->getColVentas();
            $nroVenta = count($colVentas);
            $nroVenta = $nroVenta + 1;
            $venta = new Venta($nroVenta, "22/03/23", $objCliente, []);
            for ($i=0; $i < count($colCodigosMoto); $i++){
                $codigoMoto = $colCodigosMoto [$i];
                $objMoto = $this->retornarMoto($codigoMoto);
                $exito = $venta->incorporarMoto($objMoto);
            }
            if ($exito == true){
                $reultado = "Venta realizada!";
                array_push($colVentas, $venta);
                $this->setColVentas($colVentas);
            }else {
                $reultado = "No se pudo realizar la venta!";
            }
        } else {
            $reultado = "El cliente no estaba dado de alta!";
        }
        return $reultado;
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $colVentasCliente = array();
        $colVentas = $this->getColVentas();
        for ($i = 0; $i < count($colVentas); $i++){
            $venta = $colVentas[$i];
            $objPersona = $venta->getObjCliente();
            if ($objPersona->getTipoDoc() == $tipo){
                if ($objPersona->getNumDocumento() == $numDoc){
                    array_push($colVentasCliente, $venta);
                }
            }
        }
        return $colVentasCliente;
    }
        
        
}