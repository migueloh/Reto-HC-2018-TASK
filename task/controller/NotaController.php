<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NotaController
 *
 * @author 2gdaw01
 */
class NotaController {
    //put your code here
              
    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Nota.php";
        
        $this->conectar=new Conectar();
        $this->conexion=$this->conectar->conexion();

    }
    
    public function run($accion){
        switch($accion)
        { 
            case "alta" :
                $this->crear();
                break;
            case "actualizar" :
                $this->actualizar();
                break;
            case "delete" :
                $this->delete();
                break;
   
        }
    }
    
 
    public function crear(){
        if(isset($_POST["nota"])){
             $nota=new Nota($this->conexion);
             $nota->setDescripcion($_POST["nota"]);
             $nota->setIdTarea($_GET["idTarea"]);
             $save=$nota->save();

        }
        return $save;
       
    }
   
    //FUNCION ACTUALIZAR
    public function actualizar(){
        
    }

    //FUNCION DELETE
    public function delete (){
        if(!isset($_GET["delete"])){
           
        }
       
    }
    

    
}