<?php 
class Clasificacion
{
    public $id_clasificacion;
    public $nombre;
    public $clase_hija;

    function __construct($id_clasificacion, $nombre, $clase_hija)
    {
        $this -> id_clasificacion = $id_clasificacion;
        $this -> nombre = $nombre;
        $this -> clase_hija = $clase_hija;
    }
    //Funcion para obtener todos las clasificaciones
    public static function all()
    {
        $listaClasificacion = [];
        $db = Db::getConnect();
        $sql = $db -> query('SELECT * FROM clasificacion');

        //Carga en la $listaClasificacion cada registro de la bd
        foreach($sql -> fetchAll() as $clasificacion)
        {
            $listaClasificacion [] = new Clasificacion($clasificacion['id_clasificacion'],$clasificacion['nombre'], $clasificacion['clase_hija']);
        }
        return $listaClasificacion;
    }

    public static function allPadre()
    {
        $listaClasificacion = [];
        $db = Db::getConnect();
        $sql = $db -> query('SELECT * FROM clasificacion where clase_hija is null');

        //Carga en la $listaClasificacion cada registro de la bd
        foreach($sql -> fetchAll() as $clasificacion)
        {
            $listaClasificacion [] = new Clasificacion($clasificacion['id_clasificacion'],$clasificacion['nombre'], $clasificacion['clase_hija']);
        }
        return $listaClasificacion;
    }
    //Funcion para registrar una clasificacion
    public static function save($clasificacion)
    {
        $db = Db::getConnect();
        $insert = $db -> prepare('INSERT INTO clasificacion values(:nombre,:clase_hija)');
        $insert -> bindValue('nombre', $nombre -> nombre);
        $insert -> bindValue('clase_hija', $clase_hija -> clase_hija);
        $insert -> execute();
    }
    
    //Funcion para actualizar una clasificacion
    public static function update($clasificacion)
    {
        $db = Db::getConnect();
        $update = $db -> prepare('UPDATE clasificacion set nombre=:nombre, clasificacion_hija=:clasificacion_hija where id_clasificacion=:id_clasificacion');
        $update -> bindValue('id_clasificacion', $id_clasificacion -> id_clasifiacion);
        $update -> bindValue('nombre', $nombre -> nombre);
        $update -> bindValue('clase_hija', $clase_hija -> clase_hija);
        $update -> execute(); 
    }

    //Funcion para eliminar por ID
    public static function delete($id_clasificacion)
    {
        $db = Db::getConnect();
        $delete = $db -> prepare('DELETE FROM clasificacion WHERE id_clasificacion=:id_clasificacion');
        $delete -> bindValue('id_clasificacion', $id_clasificacion);
        $delete -> execute();
    }

    //Funcion para obtener un usuario por el id
    public static function getById($id_clasificacion)
    {
        $db = Db::getConnect();
        $select = $db -> prepare('SELECT * FROM clasificacion WHERE id_clasificacion=:id_productid_clasificaciono');
        $select -> bindValue('id_clasificacion', $id_clasificacion);
        $select -> execute();
        //Asignarlo al objeto producto
        $clasificacionDb = $select -> fetch();
        $clasificacion = new Producto($clasificacionDb['id_clasificacion'],$clasificacionDb['nombre'], $clasificacionDb['clase_hija']);      
        return $clasificacion;
    }
}

?>