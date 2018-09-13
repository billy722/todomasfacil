<?php
require_once './clases/Conexion.php';
class Mensaje extends Conexion{

	private $id;
	private $nombre;
	private $apellido;
  private $correo;
  private $mensaje;



	public function __construct(){
		parent::__construct();
	}

	public function setid ($arg_id){
		$this->id=$arg_id;
	}

	public function setnombre ($arg_nombre){
		$this->nombre=$arg_nombre;
	}

	public function setapellido ($arg_apellido){
		$this->apellido=$arg_apellido;
	}

  public function setcorreo ($arg_correo){
		$this->correo=$arg_correo;
	}

  public function setmensaje ($arg_mensaje){
		$this->mensaje=$arg_mensaje;
	}

  public function insertarMensaje(){
		$agregarMensaje = $this->insertarRegistros("INSERT INTO mensajes (`id_mensajes`, `nombre_mensajes`, `apellido_mensaje`, `correo`, `mensaje`) values (null, '".$this->nombre_mensajes."', '".$this->apellido_mensajes."','".$this->correo."','".$this->mensaje."')");
    return $agregarMensaje;
	}
														// INSERT INTO mensajes (`id_mensajes`, `nombre_mensajes`, `apellido_mensaje`, `correo`, `mensaje`) VALUES ('', '', '', '', '');
  // public function listarMensajes(){
	// 	$men = "SELECT * FROM mensajes";
	// 	$resultado = $this->consultar($men);
	// 	return $resultado;
	//
  // }
	//
	// public function eliminarMensaje(){
	// 	$fun = $this->insertarRegistros("DELETE FROM mensajes WHERE id_mensaje = '".$this->id."'");
	// 	return $fun;
	// }

	}

?>
