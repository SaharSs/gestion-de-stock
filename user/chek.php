<?php
include "../config.php";
session_start();


if (!isset($_SESSION['user']))
header('location:connexu.php');
if(isset($_POST['pro']) and isset($_POST['qte']))
{
$idfrs=$_POST['idfrs'];	
$date=$_POST['date'];

$id=$_POST['pro'];
$qte=$_POST['qte'];		  
$q6="select * from produit where id=".$id;
$r=mysqli_query($c,$q6);
$row=mysqli_fetch_assoc($r);
if($_SESSION['pr_'.$id]['id']==$id)
	{
	$message="vous avez déja ajouté ce produit";
    header('location:panier.php?message='.$message);
	}else
	
    {
    $_SESSION['pr_'.$row['id']]=array(
    'id'=>$row['id'],
    'name'=>$row['name'],
    'price'=>$row['prixu'],
     'qte'=>$qte,
     'total'=>$row['prixu']*$qte,	
);
$_SESSION['totales']+=$_SESSION['pr_'.$row['id']]['total'];
$_SESSION['count']+=1;
	

$q8="insert into achat (idfrs,date,qte,idp) values ('$idfrs','$date','$qte','$id')";
$r8=mysqli_query($c,$q8);
header('location:panier.php');
	header('location:panier.php');
}
}

