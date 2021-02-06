<?php
include "../config.php";
session_start();

if (!isset($_SESSION['user']))
header('location:connexu.php');	

if(isset($_GET['id']))
{
$id=$_GET['id'];
	

$s="delete from vente where id='$id'";
$r=mysqli_query($c,$s);
	
header('location:vente.php');
}
	
?>
