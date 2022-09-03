<?php 
class Comentario
{
    public $id_comentario;
    public $texto;
    public $nombre;
    public $calificacion;
    public $id_producto;

    function __construct($id_comentario, $texto, $nombre, $calificacion, $id_producto)
    {
        $this -> id_comentario = $id_comentario;
        $this -> texto = $texto;
        $this -> nombre = $nombre;
        $this -> calificacion = $calificacion;
        $this -> id_producto = $id_producto;
    }
    //Funcion para obtener todos los comentarios
    public static function all()
    {
        $listaComentario = [];
        $db = Db::getConnect();
        $sql = $db -> query('SELECT * FROM comentario');

        //Carga en la $listaProducto cada registro de la bd
        foreach($sql -> fetchAll() as $comentario)
        {
            $listaComentario [] = new Producto($comentario['id_comentario'],$comentario['texto'], $comentario['nombre'],$comentario['calificacion'],$comentario['id_producto']);
        }
        return $listaComentario;
    }
    //Funcion para registrar un comentario
    public static function save($comentario)
    {
        $db = Db::getConnect();
        $insert = $db -> prepare('INSERT INTO comentario values(:texto,:nombre,:calificacion, :id_producto)');
        $insert -> bindValue('texto', $texto -> texto);
        $insert -> bindValue('nombre', $nombre -> nombre);
        $insert -> bindValue('calificacion', $calificacion -> calificacion);
        $insert -> bindValue('id_producto', $id_producto -> id_producto);
        $insert -> execute();
    }
    
    //Funcion para actualizar un comentario
    public static function update($comentario)
    {
        $db = Db::getConnect();
        $update = $db -> prepare('UPDATE comentario set texto=:texto, nombre=:nombre, calificacion=:calificacion where id_comentario=:id_comentario');
        $update -> bindValue('id_comentario', $id_comentario -> id_comentario);
        $update -> bindValue('texto', $texto -> texto);
        $update -> bindValue('nombre', $nombre -> nombre);
        $update -> bindValue('calificacion', $calificacion -> calificacion);
        $update -> execute(); 
    }

    //Funcion para eliminar por ID
    public static function delete($id_comentario)
    {
        $db = Db::getConnect();
        $delete = $db -> prepare('DELETE FROM comentario WHERE id_comentario=:id_comentario');
        $delete -> bindValue('id_comentario', $id_comentario);
        $delete -> execute();
    }

    //Funcion para obtener un usuario por el id
    public static function getById($id_comentario)
    {
        $db = Db::getConnect();
        $select = $db -> prepare('SELECT * FROM comentario WHERE id_comentario=:id_comentario');
        $select -> bindValue('id_comentario', $id_comentario);
        $select -> execute();
        //Asignarlo al objeto producto
        $comentaioDb = $select -> fetch();
        $comentario = new Comentario($comentaioDb['id_comentario'],$comentaioDb['texto'], $comentaioDb['nombre'],$comentaioDb['calificacion'],$comentaioDb['id_producto']);      
        return $comentario;
    }
}

?>