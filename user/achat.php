<?php
include "../config.php";
include "../header.php";
session_start();
if (!isset($_SESSION['user']))
header('location:connexu.php');
?>
<html>
    <head>
     <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/all.min.css">
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


     $q5 = "SELECT * FROM achat WHERE name LIKE '%".$m."%'  limit $depart, $num_an  ";
     $r5=mysqli_query($c,$q5); 
        
  ?>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fournisseur</th>
      <th scope="col">date</th>
  
      <th scope="col">idp</th>
      
    </tr>
  </thead>
	<?php
 while( $row = mysqli_fetch_assoc($r5))
		 {
    ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['idfrs'] ?></td>
      <td><?php echo $row['date'] ?></td>
     
      <td><?php echo $row['idp'] ?></td>
   
         <td>
          <a href="updatea.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletea.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td> 
    </tr>
	 <?php
}
	

	?>
    </tbody>
</table>
	</div>
	<?php

$q1="select id from achat WHERE name LIKE '%".$m."%'";
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


    $q3 = "SELECT * FROM achat WHERE name LIKE '%".$l."%'  limit $depart, $num_an  ";
     $r3=mysqli_query($c,$q3); 
        
  ?>
<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
          <th scope="col">fournisseur</th>
      <th scope="col">date</th>
     
      <th scope="col">idp</th>
     
    </tr>
  </thead>
	<?php
 while( $row1 = mysqli_fetch_assoc($r3))
		 {
    	
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row1['id'] ?></th>
      <td><?php echo $row1['idfrs'] ?></td>
        <td><?php echo $row1['date'] ?></td>
    
      <td><?php echo $row1['idp'] ?></td>
         <td>
          <a href="updatea.php?id=<?=$row1['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletea.php?id=<?=$row1['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td> 
    </tr>
	 <?php
}
	

	?>
    </tbody>
</table>
	</div>
	<?php

$q1="select id from achat WHERE name LIKE '%".$l."%'";
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
    $q1 = "SELECT * from  achat  limit $depart, $num_an ";
	$r1 = mysqli_query($c, $q1);
	?>
	<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fournisseur</th>
      <th scope="col">date</th>
   
      <th scope="col">idp</th>
      
      
 
    </tr>
  </thead>
	<?php
	
while($row=mysqli_fetch_assoc($r1))
{	
?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['idfrs'] ?></td>
      <td><?php echo $row['date'] ?></td>
     
      <td><?php echo $row['idp'] ?></td>
      
    
      
         <td>
          <a href="updatea.php?id=<?=$row['id'];?>"><i class="fas fa-edit"></i></a>
		</td>
		<td>
          <a  onclick="return confirm('etes vous sur');"   href="deletea.php?id=<?=$row['id'];?>"><i class="fas fa-trash"></i></a>
          
        </td> 
		
    </tr>
	 <?php
}

	?>
    </tbody>
</table>
	</div>	
<?php
$q1="select id from achat";
$r2=mysqli_query($c,$q1);
$annonce_t=mysqli_num_rows($r2);	
$pagesTotales = ceil($annonce_t/$num_an);


			
		
	?>

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
<div class="container">
<form method="post" action="chek.php"  >
<table >
<tr>
<?php 
$q5="select * from produit  ";
$r5=mysqli_query($c,$q5);
	?>
<td>
	
<label for="role">produit</label><br/>
	
<select name="pro" id="role">
	<?php
	while($row1=mysqli_fetch_assoc($r5))
	{
	
	?>
<option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
<?php
	}
		?>
</select>
</td> 
	</tr>
<tr>

<td>
	
<label for="date">qte</label><br/>
<input type="int" name="qte">	
	
</td>
	
</tr>

	
<tr>
<?php 
$q3="select * from fournisseur ";
$r3=mysqli_query($c,$q3);
	?>
<td>
	
<label for="role">fournisseur</label><br/>
	
<select name="idfrs" id="role">
	<?php
	while($row1=mysqli_fetch_assoc($r3))
	{
	
	?>
<option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
<?php
	}
		?>
</select>
</td>    
</tr>


<tr>
<td>
	
<label for="date">date</label><br/>
<input type="date" name="date">	
</td>    
</tr>



<tr>
<td><br/>
<button type="submit" name="submit"><strong>ajouter</strong></button>
</td>

</table>
</form>
	
</div>
	<a href="panier.php">panier</a>	
                      <script src="../admin/js/jquery.min.js"></script>
        <script src="../admin/js/bootstrap.min.js"></script>
    </body>
</html>