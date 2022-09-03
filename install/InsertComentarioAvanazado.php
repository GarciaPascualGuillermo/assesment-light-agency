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
 'Muy buena laptop. Viene como especifica y nueva. La recomiendo.',
'Es buen equipo, tiene buen acabado, es liviano y delgado, el procesador es de 10ma generación pero rinde bien a pesar de eso, de los 256gb vienen libres como 100 y algo, es un punto a considerar, la bateria es normalita, no sorprende pero tampoco decepciona, por el precio en cuanto a memoria ram/ capacidad es buena opcion, ya venia instalada con win 11 me hubiera gustado que viniera con el 10 pero hasta ahora jala bien con el 11, es una lap para tareas basicas y juegos sencillos.',
'Unicamente la abri para verificar que funcionara, el precio se me hace accesible y amigable el pero se lo podria poner en la calidad de la pantalla desde el primer momento se nota que la pantalla no es de las mejores incluso en algunos momentos los blancos no son tan blancos el teclado de igual manera funciona como debe pero su construccion se siente de calidad media. Es un regalo para u. Estudiante asi que seguramente eso pasara a segundo plano.',
'Excelente producto, no era para mi, era para mi hermano, hace ya varias semanas que lo adquirimos y hasta ahora le ha funcionado super bien, en estética el producto está perfectamente integro y en cuestión de funcionamiento también es muy bueno, cumple con lo necesario para no darte problemas en tus actividades diarias, el la usa prácticamente todo el día para sus clases y reuniones en linea y le funciona perfectamente bien.',
'Producto nuevo, sellado, original, llega bien protegido, sin contratiempos, recomiendo ampliamente la compra, solo tener en cuenta que es la version de importacion por lo cual no trae la letra ñ pero si la da el sistema, se puede configurar dejando la n oprimida, el teclado retroiluminado y las bocinas son de lo mejor, la pantalla increible, esta genial no pienses mas en comprarla.',
'Me gusta mucho el desempeño, ya tenía antecedentes de que era buena marca y de trabajo las lenovo thinkpad, muy satisfecho con la compra, tenía pensado cambiarle el disco duro por un ssd pero la velocidad no está mal, la estoy utilizando para programar en android studio y corre sin problemas.',
'Una computadora buena para hacer trabajos que no requeiran mucha exigencia, va destinada mas a trabajos de oficina como word, execel y para tiempos como las clases en linea, videollamadas y otra cosas. Gracias a la expancion de la memoria ram hasta 16 gb lancomputadora no se va a demorar tanto en realizar procesos, solamente en el procesador que son 2 nucleos es la desventaja pero en si para realizar cosas ligeras como mencione antes es de muy buen gusto.',
'Excelente producto, esencial para trabajar con tareas escolares y trabajos de oficina. Me ha funcionado muy bien para lo que he comentado, en su función es lo básico y se ve que es duradero. En el poco tiempo que llevo usándolo no he tenido ningún detalle técnico ni de otra índole. Siempre he usado esta marca por años y hasta hoy no me ha decepcionado.',
'Increible producto, es muy rapida, tiene excelente procesador, la relacion que tiene entre la calidad y precio vale mucho la pena,la resolucion de la imagen es muy buena, muy amplia, la capacidad de respuesta es excepcional.',
'Me salió muy buena, el precio base es alto pero la conseguí en rebaja y valió completamente todo. Quizá el único punto malo es que la tarjeta gráfica es bastante mala. Te sirve para programas de adobe, pero no esperes mucho más.',
'Excelente computadora compacta se carga rapidísimo dura la batería mas de 8 horas puedes trabajar sin problema. Ya que leí que para trabajo no servía , están sumamente equivocados al menos sean de sistemas pero están confiable para trabajar cosas pesadas yo soy arquitecta y me funciona muy bien la recomiendo 100%.',
'Buen equipo con buenas especificaciones, mas de las que ofrecen otras marcas por ese precio. Hasta ahora no hay fallas. Buena pantalla y con la memoria dedicada de gráficos corre perfecto cualquier programa y juego a una calidad mas que decente. Ademas de que es super liviana el diseño es muy parecido a una macbook pro retina ya que también tengo una macbook pro y el diseño es muy similar a escepcion de que el teclado de la asus se siente un poco plástico pero no arruina el funcionamiento.',
'Si tu eres de los que prioriza la productividad en el trabajo, la portabilidad, la bateria, el entretemiento, el diseño y el rendimiento, definitivamente te recomiendo esta laptop, soy estudiante de universidad y me funciona muy bien para mis trabajos, muchas veces tengo muchos programas abiertos a la vez como word, excel o phyton y realmente nunca se traba',
'Es un excelente equipo tengo mucho tiempo buscando la mejor opción y esta sin duda lo es. Sus teclas son increíbles al tacto, la pantalla muy acorde (es grande) perfecta para mi que no me acomodo a las de 13" suena muy fuerte con muy buena calidad en el audio. Es poco el tiempo que la llevo ocupando pero sin duda una excelente máquina.',
'Excelente, equipo eficiente y rápido. Muy satisfecho con la operatividad. A mejorar no me gusta la posición de la cámara que aunque es muy práctica por el botón poder esconderla, la posición que está en el teclado hace que automáticamente estés volteando hacia abajo y te resta concentración ya que la dirección inclinada de la cámara de abajo hacia arriba es incómoda. El resto excelente.',
'Me ha gustado mucho el producto, pensé que las bocinas me iban a ser incómodas en su lugar, pero con el uso te olvidas de ellas. Lo que si es un punto a considerar es que si no estas acostumbrado a que la cámara te mire desde abajo, te será muy incómodo atender videollamadas.',
'La compré en duda sobre el precio y el producto y quedé 100% satisfecho que chulada de laptop enciende en 10 segundos corre genshin impact sin ningún problema en resumidas cuentas vale cada centavo.',
'Por ahora tengo 3 semanas con ella, y todo bien le funciona todo excelente, prende muy rápido y claro es rápida, el único detalle es que se calienta demasiado, pero claro como es un procesador exigente, supongo que es eso.',
'La verdad es que por las características y el precio está laptop es brutal!! realmente es una laptop que te puede durar años para ciertas labores y uso de software de diseño en 3d, sus gráficos radeon vega sin de maravilla en una laptop.',
'La calidad del producto es excelente, tamaño compacto. Desde mi punto de vista, tarda un poco en arrancar pero entiendo es por el tipo de procesador, ideal para estudiantes, consulta de correos, navegacion en internet, etc.',
'El diseño y el peso. Excelente,el. Desempeño pesimo,esto debido a que no tiene ssd,lo. Cual se truduce a. Que es muy lenta. Y no puedes tener varios programas abierto,es un equipo muy basico.');
try{
for($i = 0; $i < 15000; ++$i){

    $sql = "insert into comentario(texto, nombre, calificacion, id_producto) values (?,?,?,?);";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$listTexto[rand(1,29)], $listName[rand(1,9)] , rand(1, 100), rand(1,5000)] );
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