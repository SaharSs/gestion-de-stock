<?php
include "../config.php";
session_start();
if (!isset($_SESSION['user']))
header('location:connexu.php');	
if(isset($_GET['id']))
{
$id=$_GET['id'];    
 $q1="select * from vente where id=".$id; 
 $r1=mysqli_query($c,$q1);
 while($row1=mysqli_fetch_assoc($r1))
 {

 $cl=$row1['idcl'];

 $d=$row1['date'];
 $qt=$row1['qte'];
 $pr=$row1['idpr'];
 }
 }
 if(isset($_POST['submit']))
{
$cl=$_POST['cl'];
$date=$_POST['date'];
$qte=$_POST['qte'];

$idp=$_POST['idpr'];


$s="update vente set    idcl='$cl',date='$date',qte='$qte',idpr='$idp' where id=".$id;
$r1=mysqli_query($c,$s);         

}
	
?>
<html>
    <head>
    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <title>acceuil</title>   
    </head>
    <body>
		<div class="container">
<form action=" " method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="pwd">client</label>
    <input type="text" class="form-control" id="pwd" name="cl" value="<?php echo $cl; ?>" >
  </div>
	<div class="form-group">
    <label for="pwd">date</label>
    <input type="date" class="form-control" id="pwd" name="date" value="<?php echo $d; ?>" >
  </div>
	<div class="form-group">
    <label for="pwd">qte</label>
    <input type="text" class="form-control" id="pwd" name="qte" value="<?php echo $qt; ?>" >
  </div>
	<div class="form-group">
    <label for="pwd">idpr</label>
    <input type="text" class="form-control" id="pwd" name="idpr" value="<?php echo $pr; ?>" >
  </div>

  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
		</div>
		 <script src="../admin/js/bootstrap.min.js"></script>
    </body>
</html>
