/*Mi Conexion by.Juan Arango*/

<?php

class ControlConexion{
	
	var $conn;
	function __construct(){
		$this->conn=null;
	}
    function abrirBd(){
    	try	{
			$this->conn = new mysqli('localhost', 'root', '', 'sense95');
			if ($this->conn->connect_errno) {
			printf("Connect failed: %s\n", $this->conn->connect_error);
			exit();
			}
            $this->conn->set_charset("utf8mb4");
      	}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}

    }

    function cerrarBd() {
		try{
            if ($this->conn !== null) {
                $this->conn->close();
            }
		}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}		
    }

    function ejecutarComandoSql($sql) {
        $registros_afectados = 0;
        try {
            // Verificar que la conexión existe
            if ($this->conn === null) {
                throw new Exception("No hay una conexión a la base de datos");
            }
    
            // Ejecutar el comando SQL
            $resultado = $this->conn->query($sql);
            
            // Obtener el número de registros afectados
            if ($resultado !== false) {
                $registros_afectados = $this->conn->affected_rows;
            } else {
                // Lanzar una excepción si la consulta SQL falla
                throw new Exception("Error al ejecutar el comando SQL: " . $this->conn->error);
            }
        } catch (mysqli_sql_exception $e) {
            // Manejar errores de sintaxis SQL
            throw $e; // Lanzar la excepción nuevamentez
        } catch (Exception $e) {
            // Lanzar otras excepciones nuevamente
            throw $e;
        }
    
        return $registros_afectados;
    }
    

	function ejecutarSelect($sql) {
        try {
            // Verificar que la conexión existe
            if ($this->conn === null) {
                throw new Exception("No hay una conexión a la base de datos");
            }
    
            // Ejecutar la consulta SELECT
            $recordSet = $this->conn->query($sql);
        } catch (mysqli_sql_exception $e) {
            // Manejar errores de sintaxis SQL
            echo "Error de sintaxis SQL: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            // Manejar otros tipos de excepciones
            echo "Error al ejecutar la consulta SELECT: " . $e->getMessage();
            return false;
        }
    
        return $recordSet;
    }
       
}
?>
