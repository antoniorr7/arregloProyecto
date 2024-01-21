<?php

class Controladorcentros {
   
    public $objCentros;
    public $pagina;
    public $view;

    public function __construct() {

        require_once 'php/models/centros.php';

        $this->pagina = '';
        $this->objCentros = new Centro();
        $this->view='centros';
    }

    public function listarCentros() {
            $this->view='centros';
            return $this->objCentros->listar();   
    }
   
 
    public function aniadirCentro() {
        $this->view='aniadirCentros';
        if (isset($_POST['nombre']) && isset($_POST['localidad']) && !empty($_POST['nombre']) && !empty($_POST['localidad'])) {
            if($this->objCentros->aniadir($_POST['nombre'], $_POST['localidad'])===false){
                return 'error nombre duplicado';
            }else{
              
                header("Location: index.php?action=listarCentros&controller=centros");
                exit(); 
            }
            
         }
    }
    public function borrarCentro() { 
      if (isset($_GET['id'])) {
         $this->objCentros->borrar($_GET['id']);
         header("Location: index.php?action=listarCentros&controller=centros");
    }
    }
    public function modificarCentro() { 
        $this->view='modificarCentros';
        if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['localidad'])) {
        // Lógica para actualizar el centro en la base de datos
        $this->objCentros->modificar($_POST['id'], $_POST['nombre'], $_POST['localidad']);
        header("Location: index.php?action=listarCentros&controller=centros");
    }
       
    }
    
}

