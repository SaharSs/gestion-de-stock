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


     $q5 = "SELECT * FROM categories WHERE name LIKE '%".$m."%'  limit $depart, $num_an  ";
     $r5=mysqli_query($c,$q5); 
        
  ?>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      
    </tr>
  </thead>
	<?php
 while( $row = mysqli_fetch_assoc($r5))
		 {
    	
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['name'] ?></td>
      
   
         <td>
          <a href="updatec.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletec.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td> 
    </tr>
	 <?php
}
	

	?>
    </tbody>
</table>
	</div>
	<?php

$q1="select id from categories WHERE name LIKE '%".$m."%'";
$r2=mysqli_query($c,$q1);
$annonce_t=mysqli_num_rows($r2);	
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


    $q3 = "SELECT * FROM categories WHERE name LIKE '%".$l."%'  limit $depart, $num_an  ";
     $r3=mysqli_query($c,$q3); 
        
  ?>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">cat</th>
      
    </tr>
  </thead>
	<?php
 while( $row1 = mysqli_fetch_assoc($r3))
		 {
    	
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row1['id'] ?></th>
      <td><?php echo $row1['name'] ?></td>
         <td>
          <a href="updatec.php?id=<?=$row1['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletec.php?id=<?=$row1['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td> 
    </tr>
	 <?php
}
	

	?>
    </tbody>
</table>
	</div>
	<?php

$q1="select id from categories WHERE name LIKE '%".$l."%'";
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
    $q1 = "SELECT * from  categories   limit $depart, $num_an ";
	$r1 = mysqli_query($c, $q1);
	?>
	<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      
 
    </tr>
  </thead>
	<?php
	
while($row=mysqli_fetch_assoc($r1))
{	
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['name'] ?></td>
    
      
         <td>
          <a href="updatec.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletec.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td> 
    </tr>
	 <?php
}

	?>
    </tbody>
</table>
	</div>	
<?php
$q1="select id from categories";
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