<?php 

class Persona {
//atributos
    private $dni;    
    private $nombre;
    private $apellido;
    private $fecha_nac;
//metodos
public function __construct($dni, $nombre, $apellido, $fecha_nac){
    $this->dni=$dni;
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->fecha_nac=$fecha_nac;
}
//hacemos un set para setear a todos los metodos porque son privados
    public function presentacion (){
        print "Hola, mi nombre es ".$this->nombre." ".$this->apellido;
    }
    public function saludar(){
        print "hola compañero";
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setFecha_nac($Fecha_nac){
        $this->Fecha_nac=$Fecha_nac;
    }
   //hacemos el get de cada metodo
    public function getDni ($dni){
        $this->dni;
    }
    public function getNombre($nombre){
        $this->nombre;
    }
    public function getApellido($apellido){
        $this->apellido;
    }
    public function getFecha_nac($Fecha_nac){
        $this->Fecha_nac;
    }
}

?>