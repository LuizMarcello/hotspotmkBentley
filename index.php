<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php 
//Ativar o buffer de saída, para definir cookies, iniciar sessões a hora que bem entender.
ob_start();  
?>
<?php
//Start session
if ( !isset($_SESSION) ) session_start();
//Check whether the session variables present or not, and assign them to Ordinary variables, if present.
if (!isset($_SESSION['user_level']) || (trim($_SESSION['user_level']) == '' || (trim($_SESSION['user_level']) >= 4))) {
    header("location:login.php");
}
?>
<?php if ( !isset($_SESSION) ) session_start(); ?>
<?php  error_reporting(E_ALL);
ini_set('display_errors', 1); ?>
<?php include('header.php'); ?>
<?php include('dbconfig.php'); ?>
<?php 
use PEAR2\Net\RouterOS;
require_once 'PEAR2/Autoload.php';
require_once 'config.php';
try {
	$util = new RouterOS\Util($client = new RouterOS\Client("$host", "$user", "$pass"));
	include_once('home.php');
}
catch (Exception $e) {
	echo "Erro acessando os dados: " . $e->getMessage();
	/* include_once('settings.php'); */
	/* include_once('home.php'); */
	
}
?>