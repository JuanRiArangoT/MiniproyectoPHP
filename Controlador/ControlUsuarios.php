<?php
/**
 * 
 */
class ControlUsuarios
{
	var $objUsuarios;
	
	function __construct($objUsuarios)
	{
		$this->objUsuarios=$objUsuarios;
	}
	function validarIngreso(){
			$esValido=false;
			$usuDigitado=$this->objUsuarios->getNomUsuario();
			$conDigitada=$this->objUsuarios->getContrasena();
			$comandoSql="SELECT * FROM usuarios WHERE nomusuario='".$usuDigitado."' AND contrasena='".$conDigitada."'";
			$objControlConexion=new ControlConexion();

			 $objControlConexion->abrirBd("localhost", "root", "","bdproyecto3");
			$recordSet=$objControlConexion->ejecutarSelect($comandoSql);
			if($row=$recordSet->fetch_array(MYSQLI_BOTH)){
				if($usuDigitado==$row["nomusuario"] && $conDigitada==$row[1] && $usuDigitado!=null && $usuDigitado !="" && $conDigitada!=null && $conDigitada !="" ){
					$esValido=true;
				}
				else{
					$esValido=false;
				}
			}
			return $esValido;	
		}
}
?>