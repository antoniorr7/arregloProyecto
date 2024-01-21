<?php 
require_once 'php/config/config.php';

    // Configuración por defecto
    $controladorPorDefecto = constant("ControladorporDefecto");
    $metodoPorDefecto = constant("MetodoporDefecto");


    // Verificar y asignar valores a $_GET del controlador y método
    if(!isset($_GET["controller"])){
        $_GET["controller"] = constant("ControladorporDefecto");
    }
    
    if(!isset($_GET["action"])) {
        $_GET["action"] = constant("MetodoporDefecto");
    }


    // Construir la ruta del controlador
    $rutaControlador = 'php/controllers/' . $_GET["controller"] . '.php';


    // Verificar si el controlador existe, si no usa el por defecto
    if (!file_exists($rutaControlador)) {
        $rutaControlador = 'php/controllers/' . $controladorPorDefecto . '.php';
    }


    // Cargar el controlador
    require_once $rutaControlador;
    $controladorNombre = 'Controlador' . $_GET["controller"];
    $controlador = new $controladorNombre();


    // Crear un array para el retorno de los datos de los métodos del controlador
    $retornado = array();

    // Llamada al metodo y guarda los datos en $retornado   
        $retornado = $controlador->{$_GET["action"]}();
    
// Cargar las vistas
require_once 'php/views/template/header.php';
require_once 'php/views/' . $controlador->view . '.php';
require_once 'php/views/template/footer.php';
?>