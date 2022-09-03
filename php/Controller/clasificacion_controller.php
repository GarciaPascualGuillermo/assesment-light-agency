<?php 
    class ClasificacionController
        {
            public function __construct(){}

            public function index()
            {
                $clasificacion= Clasificacion::all();
                //require_once('indexproducto.php');
            }

            public function register()
            {
                //require_once('registerproducto.php');
            }

            public function update($clasificacion)
            {
                Clasificacion ::update($clasificacion);
                header('Location: index.php');
            }

            public function delete($id_clasificacion)
            {
                require_once('Models/clasificacion.php');
                Clasificacion::delete($id_clasificacion);
                header('Location: index.php');
            }

            public function error(){
                //Vista de error
                //require_once('errorproducto.php');
            }
        }
     if(isset($_POST['action']))
        {
            $clasificacionController = new ClasificacionController();
            //Se añade el modelo
            require_once('Models/clasificacion.php');
            
            //Archivo de conexion
            require_once('connection.php');

            if($_POST['action'] == 'register')
            {
                $clasificacion = new Clasificacion($_POST['nombre'], $_POST['clase_hija']);
                $clasificacionController -> save($clasificacion);
            }
            elseif($_POST['action'] == 'update')
            {
                $clasificacion = new Producto($_POST['id_clasificacion'], $_POST['nombre'], $_POST['clase_hija']);
                $clasificacionController -> update($clasificacion);
            }
        }
        
        //Se verifica que action este definida
        if(isset($_GET['action']))
        {
            if ($_GET['action']!= 'register' & $_GET['action']!= 'index')
            {
                //Archivo de conexion
                require_once('connection.php');
                $clasificacionController =  new ClasificacionController();
                //Para eliminar
                if ($_GET['action'] == 'delete')
                {
                    $clasificacionController -> delete($_GET['id_clasificacion']);       
                }elseif ($_GET['action'] == 'update'){
                    //Mostrar la vista update con los datos del registro actualizar
                    require('Models/clasificacion.php');
                    $clasificacion= Clasificacion::getById($_GET['id_clasificacion']);
                    //Vista de update
                    require_once('updateproducto.php');
                }
            }
        }
        
        
?>