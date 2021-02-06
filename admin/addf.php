<?php
include "../config.php";
include "../header.php";
session_start();
if (!isset($_SESSION['admin']))
header('location:connex.php');
if(isset($_POST['submit']))
{	
$n=$_POST['name'];
$tel=$_POST['tel'];
$ad=$_POST['adresse'];
$e=$_POST['email'];
$s="select * from fournisseur where email='$e' ";
$t=mysqli_query($c,$s);
$a=mysqli_num_rows($t);
if($a==0)
{
$q="insert into fournisseur(name,tel,adresse,email)value('$n','$tel','$ad','$e')";
$r=mysqli_query($c,$q);
}else
{
echo "exist";	
}
}
?>
<html>
<body>
<div class="container">
<form method="post" action="" enctype="multipart/form-data">
<table >
<tr>
<td>
<label id="for">name</label><br>    
<input type="text" name="name" id="for"   />  </td>
</tr>
<tr>
<td>
<label id="for">tel</label><br>    
<input type="text" name="tel" id="for"   />  </td>
</tr>
    <tr>
<tr>
<td>
<label id="for">adresse</label><br>    
<input type="text" name="adresse" id="for"   />  </td>
</tr>
<tr>
<td>
<label id="for">email</label><br>    
<input type="email" name="email" id="for"   />  </td>
</tr>	
    <tr>		
<td><br/>
<button type="submit" name="submit"><strong>ajouter</strong></button>
</td>
</tr>
</table>
</form>
</div>    
                      <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
