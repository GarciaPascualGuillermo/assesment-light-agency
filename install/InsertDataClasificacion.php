<?php
include 'config.php';
include 'ConexionTest.php';
include 'Log.php';
$listName = array('Laptops','Tablets','Escritorio','Gamer','Workcenter','Servidores','Escolares','Edicion','Desarrollo','Nucs');
try{
for($i = 0; $i < count($listName); ++$i){

    $sql = "insert into clasificacion (nombre) values (?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$listName[$i]]);
    $error_message = "Se inserto un registro! en la tabla clasificacion";
    GetLog($error_message);
}
}catch (PDOException $e) {
    $error_message = "Ocurrio un error al insertar el registro!". $e;
    GetLog($error_message);
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>