<?php
include 'config.php';
try {
    $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
    foreach($dbh->query('SELECT * from producto') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>