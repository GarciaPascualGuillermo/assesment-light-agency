<?php
include 'config.php';
include 'ConexionTest.php';
include 'Log.php';
$listName = array('Luis','Laura','Matias','Jorge','Pedro','Lucas','Jose','Arturo','Lili','Sandra');
$listTexto= 
array('Es un equipo super rapido con pantalla y sonido muy buenos, el unico detalle fue el touchpad ya que los clicks derecho e izquierdo se quedan sumidos por momentos, lo uso con mouse por lo que para mi no es problema por ahora.',
 'La laptop tiene muy buen desempeño, es rápida, el único pero que le pongo es que no trae puerto.',
 'La relación precio-calidad es incomparable, una laptop que no decepciona y se mantiene estable en todo momento.', 
 'Relación costo precio muy bueno, ya había adquirido anteriormente este modelo y realizamos una segunda compra',
 'Me encanto la lap se siente súper genial y además es muy rápida, en tiendas el precio está por los cielos. Pero me gusta mucho , se siente bastante bien no es sencilla',
 'La laptop en general es una buena compra relacion calidad precio, Windows en modo S es un dolor de estomago, pero es sencillo de solucionar, el teclado esta en inglés no es distribucion en español latinoamericano, el color no es azul, es un gris con tintes azulados muy leves.',
 'Tienen muy buenas características, realmente yo la ocupa para trabajar, juegos no me es relevante.
 Tiene buena velocidad, las características me ayudan con mis programas que trabajó.
 Muy recomendable', 
 'Hasta el momento la he usado para trabajar en ilustrador, photoshop, correos, etc y su velocidad y funcionamiento ha sido afecuado.',
 'Es una muy buena computadora en los que a capacidades se refirre, sobre todo para un uso normal en casa y para trabajar. Aunque dice claramente que la pantalla es solamente HD, la realidad es que sí me decepcionó un poco', 
 'Muy buena laptop. Viene como especifica y nueva. La recomiendo.');
try{
for($i = 0; $i < count($listName); ++$i){

    $sql = "insert into comentario(texto, nombre, calificacion, id_producto) values (?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$listTexto[$i], $listName[$i] , rand(1, 100), rand(1,19)] );
    $error_message = "Se inserto un registro en la tabla Comentario!";
    GetLog($error_message);
}
}catch (PDOException $e) {
    $error_message = "Ocurrio un error al insertar el registro!". $e;
    GetLog($error_message);
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>