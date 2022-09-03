<?php 
class Accesorio
{
    public $id_accesorio;
    public $nombre;
    public $descripcion;
    public $id_producto;

    function __construct($id_accesorio, $nombre, $descripcion, $id_producto)
    {
        $this -> id_accesorio = $id_accesorio;
        $this -> nombre = $nombre;
        $this -> descripcion = $descripcion;
        $this -> id_producto = $id_producto;
    }
    //Funcion para obtener todos los accesorios
    public static function all()
    {
        $listaAccesorio = [];
        $db = Db::getConnect();
        $sql = $db -> query('SELECT * FROM accesorio');

        //Carga en la $listaAccesorio cada registro de la bd
        foreach($sql -> fetchAll() as $accesorio)
        {
            $listaAccesorio [] = new Accesorio($accesorio['id_accesorio'],$accesorio['nombre'],$accesorio['descripcion'],$accesorio['id_producto']);
        }
        return $listaAccesorio;
    }
    //Funcion para registrar un accesorio
    public static function save($accesorio)
    {
        $db = Db::getConnect();
        $insert = $db -> prepare('INSERT INTO accesorio values(:nombre,:descripcion, :id_producto)');
        $insert -> bindValue('nombre', $nombre -> nombre);
        $insert -> bindValue('descripcion', $descripcion -> descripcion);
        $insert -> bindValue('id_producto', $id_producto -> id_producto);
        $insert -> execute();
    }
    
    //Funcion para actualizar un comentario
    public static function update($accesorio)
    {
        $db = Db::getConnect();
        $update = $db -> prepare('UPDATE accesorio set nombre=:nombre, descripcion=:descripcion where id_accesorio=:id_accesorio');
        $update -> bindValue('id_accesorio', $id_accesorio -> id_accesorio);
        $update -> bindValue('nombre', $nombre -> nombre);
        $update -> bindValue('descripcion', $descripcion -> descripcion);
        $update -> execute(); 
    }

    //Funcion para eliminar por ID
    public static function delete($id_accesorio)
    {
        $db = Db::getConnect();
        $delete = $db -> prepare('DELETE FROM accesorio WHERE id_accesorio=:id_accesorio');
        $delete -> bindValue('id_accesorio', $id_accesorio);
        $delete -> execute();
    }

    //Funcion para obtener un usuario por el id
    public static function getById($id_accesorio)
    {
        $db = Db::getConnect();
        $select = $db -> prepare('SELECT * FROM accesorio WHERE id_accesorio=:id_accesorio');
        $select -> bindValue('id_accesorio', $id_accesorio);
        $select -> execute();
        //Asignarlo al objeto producto
        $accesorioDb = $select -> fetch();
        $accesorio = new Accesorio($accesorioDb['id_accesorio'],$accesorioDb['nombre'],$accesorioDb['descripcion'],$accesorioDb['id_producto']);      
        return $accesorio;
    }
}

?>