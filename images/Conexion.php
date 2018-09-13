<?php

class Conexion{

	private $host; //ip del motor de la base datos
	private $usuario; //root usuario con privilegio de la BD
	private $clave; //clave base datos
	private $baseDatos; //base datos a cual esta referida
   protected $con; //clase conexion se hereda


   	public function __construct(){

   		$this->host="localhost";
   		$this->usuario="proinfor";
   		$this->clave="o1eok94D0P";
   		$this->baseDatos="proinfor_figuesep";


   		// -> llama a los metodos de un clase
   		$this->con= new mysqli($this->host, $this->usuario, $this->clave, $this->baseDatos);
   			if($this->con-> connect_errno){

				echo "Fallo la conexion para entrar en la base datos: ".$this->con-> connect_error; //te muestra el error por un mensaje
				exit;

   			}else{
   				//echo "Conexion exitosa";
					mysqli_set_charset($this->con,"utf8");
   			}


	}

   public function cantidadRegistros($arg_consulta){
      $resultado= $this->con->query($arg_consulta);

        if (!$resultado) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $arg_consulta . "\n";
            echo "Errno: " . $this->con->errno . "\n";
            echo "Error: " . $this->con->error . "\n";
            exit;
        }else{
            $cantidad= $resultado->num_rows;
            return $cantidad;
        }
    }

         public function consultarRegistros($consultaArg){  //declaro un avariable y se guarda en consultaArg
            $res=$this->con->query($consultaArg);

               if(!$res){
                  echo 'Error: la ejecucion de la consulta fallo debido a: /n'; // /flecha pa otro lado /n salto linea programacion

               }else{
                  $listado = $res->fetch_all(MYSQLI_ASSOC); //la consulta es convertida en array y guardada en $listado
                  return $listado;
               }


         }

				 function consultar($consulta){
				 		// echo $consulta;
				 		$resultado = $this->con->query($consulta);
				 			if (!$resultado) {
				 				echo "SQL ERROR :".$this->con->error;
				 				exit;
				 			}
				 			return $resultado;
				 	}

				 	function convertir_array($consulta){
				 		// echo $consulta;
				 			return mysqli_fetch_array($consulta);
				 	}

				 	function mostrar_filas($consulta){
				 		return $this->con->mysqli_num($consulta);
				 		 //echo "la consulta es: ".$consulta;

				 	}
					public function cantRegistros($arg_consulta){
	    		$resultado = $this->con->query($arg_consulta);

	      if (!$resultado) {
	          echo "Lo sentimos, este sitio web está experimentando problemas.";
	          echo "Error: La ejecución de la consulta falló debido a: \n";
	          echo "Query: " . $arg_consulta . "\n";
	          echo "Errno: " . $this->con->errno . "\n";
	          echo "Error: " . $this->con->error . "\n";
	          exit;
	      }else{
	          $cantidad= $resultado->num_rows;
	          return $cantidad;
	      }
	  }

		// public function cantidadRegis($arg_consulta){
    //   $resultado= $this->con->query($arg_consulta);
		//
    //     if (!$resultado) {
    //         echo "Lo sentimos, este sitio web está experimentando problemas.";
    //         echo "Error: La ejecución de la consulta falló debido a: \n";
    //         echo "Query: " . $arg_consulta . "\n";
    //         echo "Errno: " . $this->con->errno . "\n";
    //         echo "Error: " . $this->con->error . "\n";
    //         exit;
    //     }else{
    //       if($resultado->num_rows>0){
    //           return $resultado->num_rows;
    //       }else{
    //         return 0;
    //       }
    //     }
    // }


         public function insertarRegistros($arg_consulta){
               if($this->con->query($arg_consulta)){
                     return true;
               }else{
                  echo 'error al ingresar: '.$arg_consulta;
               }
         }
// modifiar un archivo
        public function consultarExistencia($arg_consulta){


      $resultado= $this->con->query($arg_consulta);

        if (!$resultado) {
            echo "Lo sentimos, este sitio web está experimentando problemas.";
            echo "Error: La ejecución de la consulta falló debido a: \n";
            echo "Query: " . $arg_consulta . "\n";
            echo "Errno: " . $this->con->errno . "\n";
            echo "Error: " . $this->con->error . "\n";
            exit;
        }else{
            if($resultado->num_rows==0) {
              return false;//entrega false si no hay registros
            }else{
              return true;//entrega true si hay registros
            }
        }
    }


// paginador
  public function BuscarFiltarRegistros($arg_tabla,$arg_campoBuscar,$arg_palabraBuscar,$arg_pagina,$arg_cantidadRegistros){
      $arg_palabraBuscar=filter_var($arg_palabraBuscar, FILTER_SANITIZE_STRING);

      $consulta="";
      $consultaCantidad;

      $cantidadRegistros = $arg_cantidadRegistros;
      $inicio = ($arg_pagina > 1 ) ? ($arg_pagina * $cantidadRegistros - $cantidadRegistros) : 0;

        if($arg_palabraBuscar!=''){
          $consulta="select sql_calc_found_rows * from ".$arg_tabla." where ".$arg_campoBuscar." like '%".$arg_palabraBuscar."%' limit ".$inicio.",".$cantidadRegistros;
          $consultaCantidad="select * from ".$arg_tabla." where ".$arg_campoBuscar." like '%".$arg_palabraBuscar."%' ";

        }else{
          $consulta="select sql_calc_found_rows * from ".$arg_tabla." limit ".$inicio.",".$cantidadRegistros;
          $consultaCantidad="select * from ".$arg_tabla;
        }
        //echo $consulta;
        $resultado=$this->consultarRegistros($consulta);
        $cantidad= $this->cantidadRegistros($consultaCantidad);

            $cantidad= ($cantidad/$arg_cantidadRegistros);
            $cantidad= ceil($cantidad);

            $paginador="";
                for($c=1; $c<=$cantidad; $c++){
                   $paginador.='<a class="btn btn-default botonPaginador" href="javascript:cambiarPagina('.$c.')">'.$c.'</a>';
                }
        $devuelve[0][0] = $resultado;
        $devuelve[0][1] = $paginador;

        return $devuelve;
    }

		public function consultarSesion(){
		    @session_start();
		    if(isset($_SESSION['id'])){

		    }else{
		       header('location: ../principal/index.php');
		     }
		}
}
?>
