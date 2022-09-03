<?php 
	 require_once('connection.php');
	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		$controller=$_GET['controller'];
		$action=$_GET['action'];		
	} else {
		$controller='producto';
		$action='index';
	}	
	//carga la vista layout.php
	require_once('../public_html/index.php');
?>