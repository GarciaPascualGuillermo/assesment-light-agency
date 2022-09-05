<?php 
	 require_once('../Master.php');
	 require_once(APP_ROOT.'/assesment-light-agency/php/connection.php');
	 
	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		$controller=$_GET['controller'];
		$action=$_GET['action'];		
	} else {
		$controller='producto';
		$action='index';
	}	
	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		$controller=$_GET['controller'];
		$action=$_GET['action'];		
	} else {
		$controller='clasificacion';
		$action='index';
	}	
	//carga la vista layout.php
	require_once(APP_ROOT.'/assesment-light-agency/php/layout.php');
?>