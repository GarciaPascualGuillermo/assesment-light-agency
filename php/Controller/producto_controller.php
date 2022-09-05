<?php 
 require(APP_ROOT."/assesment-light-agency/php/Models/clasificacion.php");
    class ProductoController
        {
            public function __construct(){}

            public function index()
            {
                $producto= Producto::all(); 
                $destacados= Producto::destacados();
                $vendidos= Producto::vendidos(); 
                $clasificacionPadre= Clasificacion::all();
                require_once(APP_ROOT.'/assesment-light-agency/public_html/indexproducto.php');
            }

            public function register()
            {
                require_once(APP_ROOT.'/registerproducto.php');
            }

            public function update($producto)
            {
                Producto ::update($producto);
                header('Location: index.php');
            }

            public function delete($id_producto)
            {
                require_once(APP_ROOT.'/Models/producto.php');
                Producto::delete($id_producto);
                header('Location: index.php');
            }

            
        }
     if(isset($_POST['action']))
        {
            $productoController = new ProductoController();
            //Se añade el modelo
            require_once('Models/producto.php');
            
            //Archivo de conexion
            require_once('connection.php');

            if($_POST['action'] == 'register')
            {
                $producto = new Producto($_POST['modelo'], $_POST['especificaciones'], $_POST['precio'], $_POST['id_clasificacion']);
                $productoController -> save($producto);
            }
            elseif($_POST['action'] == 'update')
            {
                $producto = new Producto($_POST['id_producto'], $_POST['modelo'], $_POST['especificaciones'], $_POST['precio']);
                $productoController -> update($producto);
            }
        }
        
        //Se verifica que action este definida
        if(isset($_GET['action']))
        {
            if ($_GET['action']!= 'register' & $_GET['action']!= 'index')
            {
                //Archivo de conexion
                require_once('connection.php');
                $productoController =  new ProductoController();
                //Para eliminar
                if ($_GET['action'] == 'delete')
                {
                    $productoController -> delete($_GET['id_producto']);       
                }elseif ($_GET['action'] == 'update'){
                    //Mostrar la vista update con los datos del registro actualizar
                    require('Models/producto.php');
                    $producto= Producto::getById($_GET['id_producto']);
                    //Vista de update
                    require_once('updateproducto.php');
                }
            }
        }
        
        
?>