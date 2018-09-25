<?php
require_once 'db_config.php';


if(isset($_GET['logout']) && $_GET['logout']=="true")
{
	$user->logout();
	$user->redirect('login.php');
}
if(!isset($_SESSION['user_session']))
{
	$user->redirect('login.php');
}
?>