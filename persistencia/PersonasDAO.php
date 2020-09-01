<?php
class PersonasDAO{
    private $id;
    private $nombre;
    private $apellido;
    private $edad;
    private $telefono;
    private $cedula;
    private $correo;
    private $clave;
    private $tarjetaCredito;
    
    
     function PersonasDAO($id = "",$nombre = "",$apellido = "",$edad = "",$telefono = "",$cedula = "",$correo = "",$clave = "",$tarjetaCredito = ""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> edad = $edad;
        $this -> telefono = $telefono;
        $this -> cedula = $cedula;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> tarjetaCredito = $tarjetaCredito;
    }
    
    function inicioSesion($pcorreo, $pclave){
        return "select *
				from personas
				where correo = '" . $pcorreo . "' and clave = '" . md5($pclave) . "'";
    }
    
    function insert(){
        return "insert into personas(nombre, apellido, edad, telefono, cedula, correo, clave, tarjetaCredito)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> edad . "', '" . $this -> telefono . "', '" . $this -> cedula . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> tarjetaCredito . "')";
    }
    
    function update(){
        return "update personas set
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				correo = '" . $this -> correo . "',
				telefono = '" . $this -> telefono . "',
				cedula = '" . $this -> cedula . "',
				tarjetaCredito = '" . $this -> tarjetaCredito . "'
				where id = '" . $this -> id . "'";
    }
    
    function select() {
        return "select *
				from personas
				where id = '" . $this -> id . "'";
    }
    
    function selectAll() {
        return "select *
				from personas";
    }
}