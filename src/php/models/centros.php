<?php

require_once 'php/models/conexion.php';

class Centro extends Conexion {
    private $error;

    public function __construct() { 
        parent::__construct();
        $this->error = ''; 
    }
 public function aniadir($nombre, $localidad) {
        $query = "INSERT INTO Centro (nombre, localidad) VALUES ('$nombre', '$localidad')";
        try {
        $resultado = $this->conexion->query($query);
        } catch (mysqli_sql_exception $e) {
                return false;
        } 
        }
    

    public function modificar($id,$nombre,$localidad) {
        $query = "UPDATE Centro SET nombre = '$nombre', localidad = '$localidad' WHERE id = '$id'";
        $resultado = $this->conexion->query($query);
        return $resultado;
    }

    public function borrar($id) {
        try {
            $query = "DELETE FROM Centro WHERE id = '$id'";
            
            $resultado = $this->conexion->query($query); 
            if ($resultado === false) {
               
               echo 'Error al eliminar el centro';
            }
            //código de error de la existencia en otras tablas
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1451) {
                
                echo 'centros tiene valores en otras tablas';
            } 
        }
    }
    
    public function listar() {
        $query= 'SELECT * FROM Centro';
        $resultado = $this->conexion->query($query); 
        $centros = [];

        if ($resultado === false) {
            // La consulta SELECT falló
            echo 'Error al consultar la base de datos';
        } else {
            if ($resultado->num_rows === 0) {
                // No se encontraron filas en la tabla "nombre"
                $mensaje= '<div><p>No se encontraron registros en la tabla "centros"</p></div>';
                return $mensaje;
            } else {
                foreach ($resultado as $row) {
                    $centros[] = $row;
                }
            }
        }
        return $centros;
    }
}
?>