<?php
include "../config.php";
include "../header.php";
session_start();

if (!isset($_SESSION['admin']))
header('location:connex.php');	

if(isset($_GET['id']))
{
$id=$_GET['id'];    
 $q1="select * from users where id=".$id; 
    $r1=mysqli_query($c,$q1);
    while($row1=mysqli_fetch_assoc($r1))
    {
    $n=$row1['name'];
    $us=$row1['username'];
    $p=$row1['password'];
    $r=$row1['role'];
	}
}
   
 if(isset($_POST['submit']))
{
$name=$_POST['name'];
$user=$_POST['username'];
$p=$_POST['pwd'];
$role=$_POST['role'];
$q="select * from users where  username='$user' and id<>$id";	
$s=mysqli_query($c,$q);
$m=mysqli_num_rows($s);	
$im=$_FILES['image']['name'];	
$img=$_FILES['image']['tmp_name'];
if($m==0)
	{	
if($_FILES['image']['name']!="")
{
$ex=explode('.',$im);
$ex=end($ex);
$imgn=md5(rand(0,1000)."_".$im).".".$ex;
move_uploaded_file($img, "images/avatar". $imgn);
$q1="select image from  users  where id='$id'";	
$s1=mysqli_query($c,$q1);
$row=mysqli_fetch_assoc($s1);
if (is_file('images/avatar/'.$row['image'])) 
       {
      if($row['image']!=null)
      unlink('images/avatar/'.$row['image']);    
       }
	
	
$s="update  users set    name='$name',password='$p',username='$user',image='$imgn', role='$role' where id=".$id;
$r1=mysqli_query($c,$s);         
	
}else echo "image obl";
   
}else echo "existe";	
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
    <label for="pwd">name:</label>
    <input type="text" class="form-control" id="pwd" name="name" value="<?php echo $n; ?>" >
  </div>
	<div class="form-group">
    <label for="u">username:</label>
    <input type="text" class="form-control" id="u" name="username" value=" <?php echo $us; ?>">
  </div>
 
	<div class="form-group">
    <label for="pwd">password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" value=" <?php echo  $p ?>">
  </div>
  
  <div class="form-group">
   
    <input type="file" class="form-control"  name="image">
  </div>
	<div>
	<label for="role">role</label><br/>
<select name="role" id="role" value=" <?php echo $r; ?>">
<option value="webmaster">webmaster</option>
<option value="admin">admin</option>
<option value="user">user</option>
</select>
</div>
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
		</div>
		 <script src="js/bootstrap.min.js"></script>
    </body>
</html>
