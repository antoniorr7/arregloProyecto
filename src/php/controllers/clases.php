<?php

class Controladorclases{

    public $pagina;
    public $view;
    private $objClases;

    public function __construct() {
  
        require_once 'php/models/clases.php';
        $this->pagina = '';
        $this->view = '';
        $this->objClases = new Clase();
    }

    public function listarClases() {
        $this->view = 'clases';
        $this->pagina = 'Clases listadas';

        return $this->objClases->listar($_GET['centro_id']);
    }

    public function aniadirClases() {
        $this->view = 'aniadirClases';
    
        if (isset($_POST['etapa']) && isset($_POST['clase']) && !empty($_POST['etapa']) && !empty($_POST['clase'])) {
            $centro_id = $_GET['centro_id'];
            $this->objClases->aniadir($_POST['etapa'], $_POST['clase'], $centro_id);
    
            header('Location: index.php?action=listarClases&controller=clases&centro_id=' . $centro_id);
        }
    }

    public function borrarClases() {
        if (isset($_GET['id'])) {
            $this->objClases->borrar($_GET['id']);
            $centro_id = $_GET['centro_id'];
            header("Location: index.php?action=listarClases&controller=clases&centro_id=$centro_id");
       }
    }
    public function modificarClases() {
        $this->view = 'modificarClases';
    
        if (isset($_POST['id'], $_POST['etapa'], $_POST['clase'], $_POST['centro_id'])) {
            $this->objClases->modificar($_POST['id'], $_POST['etapa'], $_POST['clase']);
            header("Location: index.php?action=listarClases&controller=clases&centro_id={$_POST['centro_id']}");
        }
    }
    
    }



?>
