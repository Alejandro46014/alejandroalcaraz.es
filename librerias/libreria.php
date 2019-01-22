<?php

function enlaceModificarValoracion($id){
    
     require_once 'modelos/ConectarModelo.php'; 
  $conexion= ConectarModelo::conexion();
  
  $sql="SELECT * FROM valoraciones WHERE id_valoracion=:id";
  $consulta=$conexion->prepare($sql);
  
  $consulta->bindParam(':id',$id,PDO::PARAM_INT);
  
  $consulta->execute();
  $resultado=$consulta->fetch(PDO::FETCH_ASSOC);
  $fecha_valoracion= $resultado['fecha_valoracion'];
  $ahora= date("Y-m-d H:i:s");
 
  $diff=strtotime($ahora)-strtotime( $fecha_valoracion);
  $minutos = floor($diff / (60));
  
  if ($minutos<= 15){
      echo '<a href="?controller=Valoraciones&action=modificarValoracion&id='. $id.'" >Enlace modificar</a>';
  }else{
      echo 'Ya han pasado los 15 minutos';
  }
}

function subir_archivos(){
	
	
    $directorio = "img/usuarios/";
        
	$directorio_imagen="img/usuarios/".$_FILES['archivo']['name'];
	$tipo=$_FILES['archivo']['type'];
	$jpeg="image/jpeg";
	$png="image/png";
	$gif="image/gif";
	$directorio = $directorio . basename( $_FILES['archivo']['name']); 
	if($tipo==$jpeg || $tipo==$gif || $tipo==$png){
	if(move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio)) {
		
		echo("<script type='text/javascript'>
			alert('El archivo ". basename( $_FILES['archivo']['name']). " ha sido subido');
			</script>");
		
		
		
		
		
		} else{
		
		echo('<script type="text/javascript">
		alert("Ha ocurrido un error, intentelo de nuevo!, si el problema persiste contacte con el administrador");
		</script>');
		
                	
}
	}else{
		echo('<script type="text/javascript">
		alert("No es un tipo de archivo permitido(.png || .jpeg || .gif)");
					</script>');
		
		
	}
	
	if($_FILES['archivo']['name'] != ""){
		
	
        return $directorio_imagen;
		
	}else{
		
		return("");
	}
}

function subir_multiples_archivos(){
    $imagenes=[];
    $i=0;
    if(count($_FILES['archivo']) != 3){
        
        echo('<script type="text/javascript">
		alert("Debe subir
                tres imagenes por producto");
		</script>');
    }
    //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
            $nombre_imagen=$_POST['nombre_imagen'][$i];
            $directorio_imagen="img/".$_FILES['archivo']['name'][$i];
            if (empty($nombre_imagen)){
                
                echo('<script type="text/javascript">
		alert("Debe introducir el nombre de las imagenes a guardar");
		</script>');
            }
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'img/peliculas/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
                            
                           
                            $imagen=new ImagenesModelo($nombre_imagen,$directorio_imagen,"");
                            $imagenes[]=$imagen;
                            
                           
				/*echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";*/
			}
			closedir($dir); //Cerramos el directorio de destino
		}
                $i++;
	}
        return $imagenes;
}

function recorro($matriz){
 	       foreach($matriz as $key=>$value){
 		           if (is_array($value)){
                //si es un array sigo recorriendo
              echo 'key:'. $key;
              echo '<br>';
             recorro($value);
          }else{  
             //si es un elemento lo muestro
             echo $key.': '.$value ;
             echo '<br>';
          }
			
       }
} 

function LetraNIF ($dni) {
/* Obtiene letra del NIF a partir del DNI */
  $valor= (int) ($dni / 23);
  $valor *= 23;
  $valor= $dni - $valor;
  $letras= "TRWAGMYFPDXBNJZSQVHLCKEO";
  $letraNif= substr ($letras, $valor, 1);
  return $letraNif;
}