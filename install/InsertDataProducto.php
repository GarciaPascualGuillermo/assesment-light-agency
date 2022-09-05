<?php
include 'config.php';
include 'ConexionTest.php';
include 'Log.php';
$listName = array('Matebook D16','Legion 5i','Asus TUF','Macbook','Hp Pavillon','Lenovo thinkbook','IdeaPad','ThinkPad','Asus Pro Escencial','Hyundai');
$listEspecificaciones= 
array('15.6 Pulgadas, FHD, AMD R5-5500U, 8 GB de RAM, 256 GB SSD',
 'Procesador Intel Core i3, Memoria de 256GB+8GB RAM, Windows 10, Gris',
 'Intel Celeron N3060 1.60GHz, 4GB, 64GB eMMC, Windows 10 Home S', 
 'Intel Celeron , 11.6 Pulg. , 128gb SSD,  4gb RAM',
 'Core I7 Optane 11g 16gb 256gb Ssd 17.3',
 'Intel Core i5 Gen 11th 8GB RAM 256GB SSD Rosa',
 'Ci3-10Ma 8G 256Ssd', 
 'Intel Core i7 Gen 10th 16GB RAM 512GB SSD',
 'GeForce RTX 3050 / Intel Core i5 / 16.1 Pulg. / 512gb SSD / 8gb RAM ', 
 'Intel Core i5 / 14 Pulg. / 512gb SSD / 8gb RAM / Gris');
try{
for($i = 0; $i < count($listName); ++$i){

    $sql = "insert into producto(modelo, especificaciones, precio, id_clasificacion) values (?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$listName[$i], $listEspecificaciones[$i] , rand(10000, 60000), rand(1,19)] );
    $error_message = "Se inserto un registro en la tabla producto!";
    GetLog($error_message);
}
}catch (PDOException $e) {
    $error_message = "Ocurrio un error al insertar el registro!". $e;
    GetLog($error_message);
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>