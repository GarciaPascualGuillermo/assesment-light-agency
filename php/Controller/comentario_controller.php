<?php 
    class ComentarioController
        {
            public function __construct(){}

            public function index()
            {
                $comentario= Comentario::all();
            }

            public function register()
            {

            }

            public function update($comentario)
            {
                Comentario ::update($comentario);
            }

            public function delete($id_comentario)
            {
                require_once('Models/comentario.php');
                Producto::delete($id_comentario);
                header('Location: index.php');
            }

            public function error(){
                //Vista de error
                require_once('errorproducto.php');
            }
        }
     if(isset($_POST['action']))
        {
            $comentarioController = new ComentarioController();
            //Se añade el modelo
            require_once('Models/comentario.php');
            
            //Archivo de conexion
            require_once('connection.php');

            if($_POST['action'] == 'register')
            {
                $comentario = new Comentario($_POST['texto'], $_POST['nombre'], $_POST['calificacion'], $_POST['id_producto']);
                $comentarioController -> save($comentario);
            }
            elseif($_POST['action'] == 'update')
            {
                $comentario = new Comentario($_POST['id_comentario'], $_POST['texto'], $_POST['nombre'], $_POST['calificacion']);
                $comentarioController -> update($comentario);
            }
        }
        
        //Se verifica que action este definida
        if(isset($_GET['action']))
        {
            if ($_GET['action']!= 'register' & $_GET['action']!= 'index')
            {
                //Archivo de conexion
                require_once('connection.php');
                $comentarioController =  new ComentarioController();
                //Para eliminar
                if ($_GET['action'] == 'delete')
                {
                    $comentarioController -> delete($_GET['id_comentario']);       
                }elseif ($_GET['action'] == 'update'){
                    //Mostrar la vista update con los datos del registro actualizar
                    require('Models/comentario.php');
                    $comentario= Comentario::getById($_GET['id_comentario']);
                    //Vista de update
                    require_once('updateproducto.php');
                }
            }
        }
        
        
?>