<?php
include "../config.php";
session_start();
if (!isset($_SESSION['admin']))
header('location:connex.php');	
if(isset($_GET['id']))
{
$id=$_GET['id'];
	$q="delete from client where id=".$id;
	$r=mysqli_query($c,$q);
header('location:selectcl.php');
}
