<?php
include "../config.php";
session_start();

if (!isset($_SESSION['admin']))
header('location:connex.php');	

if(isset($_GET['id']))
{
$id=$_GET['id'];
	
	$q1="select image from users   where id='$id'";	
$s1=mysqli_query($c,$q1);
$row=mysqli_fetch_assoc($s1);
if (is_file('images/avatar/'.$row['image'])) 
       {
     
      unlink('images/avatar/'.$row['image']);    
       }
$s="delete from users where id='$id'";
$r=mysqli_query($c,$s);
	

}
	
?>
