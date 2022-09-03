<?php 
    class AccesorioController
        {
            public function __construct(){}

            public function index()
            {
                $accesorio= Accesorio::all();
               // require_once('indexproducto.php');
            }

            public function register()
            {
               // require_once('registerproducto.php');
            }

            public function update($accesorio)
            {
                Accesorio ::update($accesorio);
                //header('Location: index.php');
            }

            public function delete($id_accesorio)
            {
                require_once('Models/accesorio.php');
                Accesorio::delete($id_accesorio);
                header('Location: index.php');
            }

            public function error(){
                //Vista de error
                require_once('errorproducto.php');
            }
        }
     if(isset($_POST['action']))
        {
            $accesorioController = new AccesorioController();
            //Se añade el modelo
            require_once('Models/accesorio.php');
            
            //Archivo de conexion
            require_once('connection.php');

            if($_POST['action'] == 'register')
            {
                $accesorio = new Accesorio($_POST['nombre'], $_POST['descripcion'], $_POST['id_producto']);
                $accesorioController -> save($accesorio);
            }
            elseif($_POST['action'] == 'update')
            {
                $accesorio = new Accesorio($_POST['id_accesorio'], $_POST['nombre'], $_POST['descripcion']);
                $accesorioController -> update($accesorio);
            }
        }
        
        //Se verifica que action este definida
        if(isset($_GET['action']))
        {
            if ($_GET['action']!= 'register' & $_GET['action']!= 'index')
            {
                //Archivo de conexion
                require_once('connection.php');
                $accesorioController =  new AccesorioController();
                //Para eliminar
                if ($_GET['action'] == 'delete')
                {
                    $accesorioController -> delete($_GET['id_accesorio']);       
                }elseif ($_GET['action'] == 'update'){
                    //Mostrar la vista update con los datos del registro actualizar
                    require('Models/accesorio.php');
                    $accesorio= Accesorio::getById($_GET['id_accesorio']);
                    //Vista de update
                    require_once('updateproducto.php');
                }
            }
        }
        
        
?>