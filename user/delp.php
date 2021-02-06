<?php
include("../config.php");
session_start();
if(isset($_GET['id']))
{
$id=$_GET['id'];
$t="select * from factureachat where id=".$id;
$h=mysqli_query($c,$t);
$p=mysqli_num_rows($h);
 if($p>0)
        {
      while($row=mysqli_fetch_assoc($h))
          {
              if(is_file('../upload/'.$row['pdf'])) 
              
               unlink('../upload/'.$row['pdf']);
	  }
         }
     
 $m="delete from factureachat where id='$id'";
        $r1=mysqli_query($c,$m);   
    
    
     
header('location:selectfa.php');
}
