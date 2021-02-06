<?php
include "../admin/config/db.php";
session_start();
function supp_pan($id,$prix)
{
unset($_SESSION['pr_'.$id]);
$_SESSION['totales']-=$prix;	
$_SESSION['count']-=1;	
}
supp_pan($_GET['id'],$_GET['prix']);


header('location:panier.php');