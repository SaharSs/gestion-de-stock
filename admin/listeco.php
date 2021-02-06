<?php
include "../config.php";
include "../header.php";
session_start();

if (!isset($_SESSION['admin']))
header('location:connex.php');

?>
<html>
    <head>
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>acceuil</title>   
    </head>
    <body>
  
    <form method="POST" action=""> 
     Recherchez  
    <input type="text" name="recherche">
     <input type="submit" value="recherche"> 
     </form>
		<?php
		
if(isset($_POST['recherche']) AND !empty($_POST['recherche'])) {
    $m = htmlspecialchars($_POST['recherche']);
	$num_an=2;
 if(isset($_GET['page']))
	{
	$page=$_GET['page'];
	}else
	{
	$page=1;
	}
		$depart=($page-1)*	$num_an;


     $q4 = "SELECT * FROM achat WHERE date LIKE '%".$m."%'  limit $depart, $num_an  ";
     $r4=mysqli_query($c,$q4); 
        
  ?>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fournisseur</th>
      <th scope="col">date</th>
      
    </tr>
  </thead>
	<?php
 while( $row4 = mysqli_fetch_assoc($r4))
		 {
    	
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row4['id'] ?></th>
	<?php
$q5="select * from fournisseur  where id=". $row4['id'];
$r5=mysqli_query($c,$q5);
	 while($row1=mysqli_fetch_assoc($r5))
	{
	
	 ?>
      <td><?php echo $row1['name'] ?></td>
		<?php
	 }
    ?>  
       <td><?php echo $row4['date'] ?></td>
         <td>
          <a href="updatec.php?id=<?=$row4['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletec.php?id=<?=$row4['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td> 
		<td>
		  <a href="commande.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
    </tr>
	 <?php
}
	

	?>
    </tbody>
</table>
	</div>
	<?php

$q6="select id from achat WHERE date LIKE '%".$m."%'";
$r6=mysqli_query($c,$q6);
$annonce_t=mysqli_num_rows($r6);	
$pagesTotales = ceil($annonce_t/$num_an);
?>
<nav aria-label="Page navigation example">
     <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=<?php if($page-1>0) {echo $page-1 ;}else{echo '1';}?>&rec=<?php echo $m; ?>">Previous</a></li>
	  <?php
	 for($i=1;$i<=$pagesTotales;$i++)
      {
	?>
    <li class="page-item"><a class="page-link"  href="?page=<?php echo  $i ;?>&rec=<?php echo $m; ?>"> <?= $i; ?></a></li>
	<?php	  
	  }
 ?>
    <li class="page-item"><a class="page-link" href="?page=<?php if( $page+1<$pagesTotales){echo $page+1 ;}elseif( $page+1>=$pagesTotales){echo $pagesTotales ;}?>&rec=<?php echo $m; ?>">Next</a></li>
    </ul>
    </nav>
	<?php
}else if(isset($_GET['rec'])) {
    $l =$_GET['rec'] ;
	$num_an=2;
if(isset($_GET['page']))
	{
	$page=$_GET['page'];
	}else
	{
	$page=1;
	}
		$depart=($page-1)*	$num_an;


    $q3 = "SELECT * FROM achat WHERE date LIKE '%".$l."%'  limit $depart, $num_an  ";
     $r3=mysqli_query($c,$q3); 
        
  ?>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fournisseur</th>
      <th scope="col">date</th>
      
    </tr>
  </thead>
	<?php
 while( $row3 = mysqli_fetch_assoc($r3))
		 {
    	
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row3['id'] ?></th>
	<?php
$q5="select * from fournisseur  where id=". $row3['id'];
$r5=mysqli_query($c,$q5);
	 while($row1=mysqli_fetch_assoc($r5))
	{
	
	 ?>
      <td><?php echo $row1['name'] ?></td>
		<?php
	 }
    ?>  
       <td><?php echo $row3['date'] ?></td>
         <td>
          <a href="updatec.php?id=<?=$row3['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletec.php?id=<?=$row3['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td> 
		<td>
		
		  <a href="commande.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
    </tr>
	 <?php
}
	

	?>
    </tbody>
</table>
	</div>
	<?php

$q1="select id from achat WHERE date LIKE '%".$l."%'";
$r2=mysqli_query($c,$q1);
$annonce_t=mysqli_num_rows($r2);	
$pagesTotales = ceil($annonce_t/$num_an);


	?>
<nav aria-label="Page navigation example">
     <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=<?php if($page-1>0) {echo $page-1 ;}else{echo '1';}?>&rec=<?php echo $l; ?>">Previous</a></li>
	  <?php
	 for($i=1;$i<=$pagesTotales;$i++)
      {
	?>
    <li class="page-item"><a class="page-link"  href="?page=<?php echo  $i ;?>&rec=<?php echo $l; ?>"> <?= $i; ?></a></li>
	<?php	  
	  }
 ?>
    <li class="page-item"><a class="page-link" href="?page=<?php if( $page+1<$pagesTotales){echo $page+1 ;}elseif( $page+1>=$pagesTotales){echo $pagesTotales ;}?>&rec=<?php echo $l; ?>">Next</a></li>
    </ul>
    </nav>

	
	<?php	
		}else
{
	$num_an=2;
		if(isset($_GET['page']))
	{
	$page=$_GET['page'];
	}else
	{
	$page=1;
	}
	$depart=($page-1)*	$num_an;
    $q1 = "SELECT * from  achat   limit $depart, $num_an ";
	$r1 = mysqli_query($c, $q1);
	?>
	<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fournisseur</th>
      <th scope="col">date</th>
      
    </tr>
  </thead>
	<?php
 while( $row = mysqli_fetch_assoc($r1))
		 {
    	
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
	<?php
$q7="select * from fournisseur  where id=". $row['id'];
$r7=mysqli_query($c,$q7);
	 while($row1=mysqli_fetch_assoc($r7))
	{
	
	 ?>
      <td><?php echo $row1['name']; ?></td>
		<?php
	 }
    ?>  
       <td><?php echo $row['date']; ?></td>
         <td>
          <a href="updatec.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletec.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td>
		<td>
          <a href="commande.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
    </tr>
	 <?php
}
	

	?>
    </tbody>
</table>
	</div>
	<?php

$q1="select id from achat ";
$r2=mysqli_query($c,$q1);
$annonce_t=mysqli_num_rows($r2);	
$pagesTotales = ceil($annonce_t/$num_an);


			
		
		
	?>
	<a type="submit"  href="addc.php"  class="btn btn-primary">ajouter</a ><br><br>
	<nav aria-label="Page navigation example">
     <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=<?php if($page-1>0) {echo $page-1 ;}else{echo '1';}?>">Previous</a></li>
	  <?php
	 for($i=1;$i<=$pagesTotales;$i++)
      {
	?>
    <li class="page-item"><a class="page-link"  href="?page=<?php echo  $i ;?>"> <?= $i; ?></a></li>
	<?php	  
	  }
 ?>
    <li class="page-item"><a class="page-link" href="?page=<?php if( $page+1<$pagesTotales){echo $page+1 ;}elseif( $page+1>=$pagesTotales){echo $pagesTotales ;}?>">Next</a></li>
    </ul>
    </nav>

<?php
}
		?>
		
 <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
    </body>
</html>