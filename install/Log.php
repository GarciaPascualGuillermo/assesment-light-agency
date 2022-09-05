<?php

function GetLog($message){ 
    $error_message = $message;
    $log_file = "mylog.log";
    ini_set("log_errors", TRUE); 
    ini_set('error_log', $log_file);
    error_log($error_message);   
}

?>

