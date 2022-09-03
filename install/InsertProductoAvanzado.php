<?php
include 'config.php';
include 'ConexionTest.php';
include 'Log.php';
$listName = 
array('Matebook D16'
,'Legion 5i'
,'Asus TUF'
,'Macbook'
,'Hp Pavillon'
,'Lenovo thinkbook'
,'IdeaPad'
,'ThinkPad'
,'Asus Pro Escencial'
,'Hyundai'
,'Lenovo IdeaPad 14IML05'
,'Asus D515DA'
,'Lenovo IdeaPad 15IML05'
,'HP 14-cf2510la'
,'Asus VivoBook E410MA'
,'HP 240 G8'
,'Evolve III Education'
,'Acer C733'
,'Lenovo Ideapad 3 Chromebook'
,'Lenovo IdeaPad D330-10IGL'
,'Dell Inspiron 3505'
,'Lenovo IdeaPad D330-10IGL'
,'HP 15-dw3033dx'
,'HP 14-dq0005dx'
,'Lenovo V15-IGL'
,'Gateway Ultra Slim GWNR71517'
,'Asus Vivobook X515'
,'Hp Pavilion 15-er0021la'
,'Lenovo IdeaPad 15ITL05'
,'MSI Thin GF63');

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
 'Intel Core i5 / 14 Pulg. / 512gb SSD / 8gb RAM / Gris'
 ,'Intel Core i5 10300H 8GB de RAM 512GB SSD, NVIDIA GeForce GTX 1650'
 ,'AMD Ryzen 7 3700U 8GB de RAM 512GB SSD, AMD Radeon RX Vega'
 ,'Intel I3 8gb 256gb Ssd Windows 11'
 ,'Intel Core i7 1165G7 12GB de RAM 512GB SSD, Intel Iris Xe Graphics G7 96EUs'
 ,'Intel Celeron N4000 4GB de RAM 64GB SSD, Intel UHD Graphics 600'
 ,'Intel Core i3 1115G4 8GB de RAM 256GB SSD, Intel UHD Graphics G4 48EUs'
 ,'Intel Celeron N4000 4GB de RAM 32GB SSD, Intel UHD Graphics 600'
 ,'Intel Core i5 1035G1 8GB de RAM 256GB SSD, Intel UHD Graphics G1'
 ,'Intel Celeron N4020 4GB de RAM 500GB HDD, Intel UHD Graphics 600'
 ,'Intel Core i3 10110U 8GB de RAM 1TB HDD 128GB SSD, Intel UHD Graphics'
 ,'Intel Celeron N4020 4GB de RAM 128GB SSD, Intel UHD Graphics 600'
 ,'ntel Core i3 10110U 8GB de RAM 1TB HDD 128GB SSD, Intel UHD Graphics 620'
 ,'AMD Ryzen 3 3250U 8GB de RAM 256GB SSD, AMD Radeon RX Vega 3'
 ,'Intel Core i3 10110U 8GB de RAM 1TB HDD 128GB SSD, Intel UHD Graphics 620'
 ,'Intel Core i3 10110U 8GB de RAM 256GB SSD, Intel UHD Graphics 620'
 ,'AMD Ryzen 5 5500U 8GB de RAM 256GB SSD, AMD Radeon RX Vega 7'
 ,'Intel Core i3 10110U 8GB de RAM 256GB SSD, Intel UHD Graphics 620'
 ,'AMD Ryzen 5 3450U 8GB de RAM 256GB SSD, AMD Radeon RX Vega 8'
 ,'AMD Ryzen 5 4600H 16GB de RAM 512GB SSD, AMD Radeon RX Vega 6'
 ,'Intel Core i7 1165G7 12GB de RAM 512GB SSD, Intel Iris Xe Graphics G7');
try{
for($i = 0; $i < 5000; ++$i){

    $sql = "insert into producto(modelo, especificaciones, precio, id_clasificacion) values (?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$listName[rand(1,29)], $listEspecificaciones[rand(1,29)] , rand(10000, 60000), rand(1,19)] );
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