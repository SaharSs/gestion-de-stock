<?php
include "../config.php";
include "../header.php";
session_start();
if (!isset($_SESSION['admin']))
header('location:connex.php');	
if(isset($_GET['id']))
{
$id=$_GET['id'];    
 $q1="select * from categories where id=".$id; 
 $r1=mysqli_query($c,$q1);
 while($row1=mysqli_fetch_assoc($r1))
 {
 $n=$row1['name'];
 }
 }
  if(isset($_POST['submit']))
{
$cat=$_POST['name'];

$q="select * from categories where  name='$cat' and id<>$id";	
$s=mysqli_query($c,$q);
$m=mysqli_num_rows($s);	
if($m==0)
{
$s="update  categories set    name='$cat' where id=".$id;
$r1=mysqli_query($c,$s);         
}else
{
echo "existe";
}
}
	
?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>acceuil</title>   
    </head>
    <body>
		<div class="container">
<form action=" " method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="pwd">cat:</label>
    <input type="text" class="form-control" id="pwd" name="name" value="<?php echo $n; ?>" >
  </div>
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
		</div>
		 <script src="js/bootstrap.min.js"></script>
    </body>
</html>
