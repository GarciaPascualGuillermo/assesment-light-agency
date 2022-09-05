<?php
include 'config.php';
try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
   
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>