<?php

	//función que llama al controlador y su respectiva acción, que son pasados como parámetros
	function call($controller, $action){
		//importa el controlador desde la carpeta Controllers
		require_once('Controller/' . $controller . '_controller.php');
		//crea el controlador
		switch($controller){
			case 'producto':
				require_once('Models/producto.php');
				$controller= new ProductoController();
				break; 
			case 'comentario':
				require_once('Models/comentario.php');
				$controller= new ComentarioController();
				break;
			case 'clasificacion':
				require_once('Models/clasificacion.php');
				$controller= new ClasificacionController();
				break; 
			case 'accesorio':
				require_once('Models/accesorio.php');
				$controller= new AccesorioController();
				break;  	
		}
		//llama a la acción del controlador
		$controller->{$action }();
	}

	//array con los controladores y sus respectivas acciones
	$controllers= array(
						'producto'=>['index','register'],
						'comentario' => ['index', 'register'],
						'calificacion'=>['index','register'],
						'accesorio' => ['index', 'register'],
						);
	//verifica que el controlador enviado desde index.php esté dentro del arreglo controllers
	if (array_key_exists($controller, $controllers)) {
		//verifica que el arreglo controllers con la clave que es la variable controller del index exista la acción
		if (in_array($action, $controllers[$controller])) {
			//llama  la función call y le pasa el controlador a llamar y la acción (método) que está dentro del controlador
			call($controller, $action);
		}else{
			call($controller, 'error');
		}
	}else{// le pasa el nombre del controlador y la pagina de error
		call($controller, 'error');
	}
?>