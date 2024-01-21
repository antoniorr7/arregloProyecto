<?php
require_once 'php/models/conexion.php';

class Clase extends Conexion {
    
    public function __construct() { 
        parent::__construct();
    }

    public function aniadir($etapa, $clase, $centro_id) {
        $query = "INSERT INTO Clase (etapa, clase, centro_id) VALUES ('$etapa', '$clase', '$centro_id')";

        try {
            $this->conexion->query($query);
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                // Código 1062 indica una violación de clave única
                return 'ya existe';
            } 
        }
    }

    public function modificar($id, $etapa, $clase) {
        $query = "UPDATE Clase SET etapa = '$etapa', clase = '$clase' WHERE id = '$id'";
        $resultado = $this->conexion->query($query);
        if ($resultado === false) {
            return 'Error al modificar la clase';
        }

        return true;
    }
    

    public function borrar($id) {
        try {
            $query = "DELETE FROM Clase WHERE id = '$id'";
            $resultado = $this->conexion->query($query);

            if ($resultado === false) {
                echo 'Error al eliminar la clase';
            }
            // Código de error de la existencia en otras tablas
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1451) {
                echo 'Clase tiene valores en otras tablas';
            } 
        }
    }

    public function listar($centro_id) {
        $query = "SELECT * FROM Clase WHERE centro_id = '$centro_id'";
        $resultado = $this->conexion->query($query); 
        $clases = [];

        if ($resultado === false) {
            // La consulta SELECT falló
            echo 'Error al consultar la base de datos';
        } else {
            if ($resultado->num_rows === 0) {
                // No se encontraron filas en la tabla "nombre"
                echo 'No se encontraron registros en la tabla "clases"';
            } else {
                foreach ($resultado as $fila) {
                    $clases[] = $fila;
                }
            }
        }
        return $clases;


    }
}
?>