<?php
require_once 'persistencia/conexion.php';
require_once 'persistencia/PersonasDAO.php';


class Personas {
    
    private $id;
    private $nombre;
    private $apellido;
    private $edad;
    private $telefono;
    private $cedula;
    private $correo;
    private $clave;
    private $tarjetaCredito;
    private $conexion;
    private $personasDAO;
    
    
     function Personas($id = "",$nombre = "",$apellido = "",$edad = "",$telefono = "",$cedula = "",$correo = "",$clave = "",$tarjetaCredito = ""){
        
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> edad = $edad;
        $this -> telefono = $telefono;
        $this -> cedula = $cedula;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> tarjetaCredito = $tarjetaCredito;
        $this -> personasDAO = new PersonasDAO($this -> id, $this -> nombre, $this -> apellido, $this -> edad, $this -> telefono, $this -> cedula, $this -> correo, $this -> clave, $this -> tarjetaCredito);
        $this -> conexion = new Conexion();
    }
   
    function getId()
    {
        return $this->id;
    }
    
    function getPersonasDAO()
    {
        return $this->personasDAO;
    }

   
    function setId($id)
    {
        $this->id = $id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

     function getApellido()
    {
        return $this->apellido;
    }

     function getEdad()
    {
        return $this->edad;
    }

     function getTelefono()
    {
        return $this->telefono;
    }

     function getCedula()
    {
        return $this->cedula;
    }

    
     function getTarjetaCredito()
    {
        return $this->tarjetaCredito;
    }

     function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

     function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

     function setEdad($edad)
    {
        $this->edad = $edad;
    }

     function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

     function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

     function setTarjetaCredito($tarjetaCredito)
    {
        $this->tarjetaCredito = $tarjetaCredito;
    }
    
     function getCorreo()
    {
        return $this->correo;
    }

     function getClave()
    {
        return $this->clave;
    }

     function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    
     function setClave($clave)
    {
        $this->clave = $clave;
    }

    
    function inicioSesion($correo, $clave){
        $this -> conexion -> open();
        $this -> conexion -> run($this -> personasDAO -> inicioSesion($correo, $clave));
        if($this -> conexion -> numRows()==1){
            $result = $this -> conexion -> fetchRow();
            $this -> id = $result[0];
            $this -> nombre = $result[1];
            $this -> apellido = $result[2];
            $this -> edad = $result[3];
            $this -> telefono = $result[4];
            $this -> cedula = $result[5];
            $this -> correo = $result[6];
            $this -> clave = $result[7];
            $this -> tarjetaCredito = $result[8];
            $this -> conexion -> close();
            return true;
        }else{
            $this -> conexion -> close();
            return false;
        }
    }
    
    function insert(){
        $this -> conexion -> open();
        $this -> conexion -> run($this -> personasDAO -> insert());
        $this -> conexion -> close();
    }
    
    function update(){
        $this -> conexion -> open();
        $this -> conexion -> run($this -> personasDAO -> update());
        $this -> conexion -> close();
    }
    
    function select(){
        $this -> conexion -> open();
        $this -> conexion -> run($this -> personasDAO -> select());
        $result = $this -> conexion -> fetchRow();
        $this -> conexion -> close();
        $this -> id = $result[0];
        $this -> nombre = $result[1];
        $this -> apellido = $result[2];
        $this -> edad = $result[3];
        $this -> telefono = $result[4];
        $this -> cedula = $result[5];
        $this -> correo = $result[6];
        $this -> clave = $result[7];
        $this -> tarjetaCredito = $result[8];
    }
    
    function selectAll(){
        $this -> conexion -> open();
        $this -> conexion -> run($this -> personasDAO -> selectAll());
        $persons = array();
        while ($result = $this -> conexion -> fetchRow()){
            array_push($persons, new Personas($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8]));
        }
        $this -> conexion -> close();
        return $persons;
    }
    
    //---------------------------------------------------------------------------------------------
    function registroPersona(){
        $contenidoArchivo = file_get_contents('logica/personas.json');
        $person = json_decode($contenidoArchivo,true);
        $person[] = array(
            "id"=> $this -> id,
            "nombre"=> $this -> nombre,
            "apellido"=> $this -> apellido,
            "edad"=> $this -> edad,
            "telefono"=> $this -> telefono,
            "cedula"=> $this -> cedula,
            "correo"=> $this -> correo,
            "clave"=> $this -> clave,
            "tarjetaCredito"=> $this -> tarjetaCredito,
        );
        
        $archivo = fopen("logica/personas.json", "w");
       
        fwrite($archivo, json_encode($person));
        fclose($archivo);
    }
    
     function consultaPersonas(){
        $contenidoArchivo = file_get_contents('logica/personas.json');
        echo $contenidoArchivo;
    }

     function consultaPersona($cedula){
        $contenidoArchivo = file_get_contents('logica/personas.json');
        $person = json_decode($contenidoArchivo,true);
                
        for($i=0;$i < sizeof($person);$i++){
            if($person[$i]["cedula"] == $cedula){
                echo json_encode($person[$i]);
                $i=sizeof($person);
            }
        }
        
    }
    
     function editarPersona($cedula){
        $contenidoArchivo = file_get_contents('logica/personas.json');
        $person = json_decode($contenidoArchivo,true);
        $persona = array(
            "id"=> $this -> id,
            "nombre"=> $this -> nombre,
            "apellido"=> $this -> apellido,
            "edad"=> $this -> edad,
            "telefono"=> $this -> telefono,
            "cedula"=> $this -> cedula,
            "correo"=> $this -> correo,
            "clave"=> $this -> clave,
            "tarjetaCredito"=> $this -> tarjetaCredito,
        );

        for($i=0;$i < sizeof($person);$i++){
            if($person[$i]["cedula"] == $cedula){
                $person[$i] = $persona;
                $i=sizeof($person);
            }
        }
        

        $archivo = fopen("logica/personas.json", "w");
       
        fwrite($archivo, json_encode($person));
        fclose($archivo);
    }
    
    
    
    
}