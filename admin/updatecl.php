<?php
include "../config.php";
include "../header.php";
session_start();
if (!isset($_SESSION['admin']))
header('location:connex.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$l="select * from client where id=".$id;
$r1=mysqli_query($c,$l);
while($row=mysqli_fetch_assoc($r1))
{
$na=$row['name'];	
$tl=$row['tel'];	
$adr=$row['adresse'];	
$em=$row['email'];	
}
}
if(isset($_POST['submit']))
{	
$n=$_POST['name'];
$tel=$_POST['tel'];
$ad=$_POST['adresse'];
$e=$_POST['email'];
$s="select * from client where email='$e' and id<>$id ";
$t=mysqli_query($c,$s);
$a=mysqli_num_rows($t);
if($a==0)
{
$q="update client set name='$n',tel='$tel',adresse='$ad',email='$e' where id=".$id;
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
<form method="post" action="">
<table >
<tr>
<td>
<label id="for">name</label><br>    
<input type="text" name="name" id="for"  value="<?=  $na;  ?>"  />  </td>
</tr>
<tr>
<td>
<label id="for">tel</label><br>    
<input type="text" name="tel" id="for" value="<?=  $tl;  ?>"  />  </td>
</tr>
    <tr>
<tr>
<td>
<label id="for">adresse</label><br>    
<input type="text" name="adresse" id="for" value="<?= $adr;  ?> "  /> </td>
</tr>
<tr>
<td>
<label id="for">email</label><br>    
<input type="email" name="email" id="for"  value=" <?=  $em;  ?> " /></td>
</tr>	
    <tr>		
<td><br/>
<button type="submit" name="submit"><strong>update</strong></button>
</td>
</tr>
</table>
</form>
</div>    
                      <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
