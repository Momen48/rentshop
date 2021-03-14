<?php
session_start();
require_once ('../database/config.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
	header('location: login.php');
}


	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['id'];
		$sql = "DELETE FROM category WHERE id='$id'";
		if(mysqli_query($connection, $sql)){
			header('location:categories.php');
			$smsg="Category DELETED!";
		}
	}else{
		header('location: categories.php');
		$fmsg="Failed to delete Category!";
	}
   
?>