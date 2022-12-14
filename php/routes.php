<?php

	//función que llama al controlador y su respectiva acción, que son pasados como parámetros
	function call($controller, $action){
		//importa el controlador desde la carpeta Controllers
		define('__ROOT1__', dirname(dirname(__FILE__)));                      
		require_once(__ROOT1__.'/php/Controller/' . $controller . '_controller.php');
		//crea el controlador
		switch($controller){
			case 'producto':
				require_once(__ROOT__.'/php/Models/producto.php');			
				$controller= new ProductoController();
				break; 
			case 'comentario':
				require_once(__ROOT__.'/php/Models/comentario.php');
				$controller= new ComentarioController();
				break;
			case 'clasificacion':
				require_once(__ROOT__.'/php/Models/clasificacion.php');
				$controller= new ClasificacionController();
				break; 
			case 'accesorio':
				require_once(__ROOT__.'/php/Models/accesorio.php');
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
		//	call($controller, 'error');
		}
	}else{// le pasa el nombre del controlador y la pagina de error
		call($controller, 'error');
	}
?>