<?php 
class Producto
{
    public $id_producto;
    public $modelo;
    public $especificaciones;
    public $precio;
    public $id_clasificacion;

    function __construct($id_producto, $modelo, $especificaciones, $precio, $id_clasificacion)
    {
        $this -> id_producto = $id_producto;
        $this -> modelo = $modelo;
        $this -> especificaciones = $especificaciones;
        $this -> precio = $precio;
        $this -> id_clasificacion = $id_clasificacion;
    }
    //Funcion para obtener todos los productos
    public static function all()
    {
        $listaProducto = [];
        $db = Db::getConnect();
        $sql = $db -> query('SELECT * FROM producto');

        //Carga en la $listaProducto cada registro de la bd
        foreach($sql -> fetchAll() as $producto)
        {
            $listaProducto [] = new Producto($producto['id_producto'],$producto['modelo'], $producto['especificaciones'],$producto['precio'],$producto['id_clasificacion']);
        }
        return $listaProducto;
    }

    public static function destacados()
    {
        $listaProducto = [];
        $db = Db::getConnect();
        $sql = $db -> query('SELECT DISTINCT  * FROM producto ORDER BY RAND() LIMIT 10');

        //Carga en la $listaProducto cada registro de la bd
        foreach($sql -> fetchAll() as $producto)
        {
            $listaProducto [] = new Producto($producto['id_producto'],$producto['modelo'], $producto['especificaciones'],$producto['precio'],$producto['id_clasificacion']);
        }
        return $listaProducto;
    }


    public static function vendidos()
    {
        $listaProducto = [];
        $db = Db::getConnect();
        $sql = $db -> query('SELECT * FROM producto ORDER BY RAND() LIMIT 10');

        //Carga en la $listaProducto cada registro de la bd
        foreach($sql -> fetchAll() as $producto)
        {
            $listaProducto [] = new Producto($producto['id_producto'],$producto['modelo'], $producto['especificaciones'],$producto['precio'],$producto['id_clasificacion']);
        }
        return $listaProducto;
    }
    //Funcion para registrar un producto
    public static function save($producto)
    {
        $db = Db::getConnect();
        $insert = $db -> prepare('INSERT INTO producto values(:modelo,:especificaciones,:precio, :id_clasificacion)');
        $insert -> bindValue('modelo', $modelo -> modelo);
        $insert -> bindValue('especificaciones', $especificaciones -> especificaciones);
        $insert -> bindValue('precio', $precio -> precio);
        $insert -> bindValue('id_clasificacion', $id_clasificacion -> id_clasificacion);
        $insert -> execute();
    }
    
    //Funcion para actualizar un producto
    public static function update($producto)
    {
        $db = Db::getConnect();
        $update = $db -> prepare('UPDATE producto set modelo=:modelo, especificaciones=:especificaciones, precio=:precio where id_producto=:id_producto ');
        $update -> bindValue('id_producto', $id_producto -> id_producto);
        $update -> bindValue('modelo', $modelo -> modelo);
        $update -> bindValue('especificaciones', $especificaciones -> especificaciones);
        $update -> bindValue('precio', $precio -> precio);
        $update -> execute(); 
    }

    //Funcion para eliminar por ID
    public static function delete($id_producto)
    {
        $db = Db::getConnect();
        $delete = $db -> prepare('DELETE FROM producto WHERE id_producto=:id_producto');
        $delete -> bindValue('id_producto', $id_producto);
        $delete -> execute();
    }

    //Funcion para obtener un usuario por el id
    public static function getById($id_producto)
    {
        $db = Db::getConnect();
        $select = $db -> prepare('SELECT * FROM producto WHERE id_producto=:id_producto');
        $select -> bindValue('id_producto', $id_producto);
        $select -> execute();
        //Asignarlo al objeto producto
        $productoDb = $select -> fetch();
        $producto = new Producto($productoDb['id_producto'],$productoDb['modelo'], $productoDb['especificaciones'],$productoDb['precio'],$productoDb['id_clasificacion']);      
        return $producto;
    }
}

?>