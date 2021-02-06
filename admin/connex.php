<?php
include "../config.php";

session_start();
if(isset($_POST['submit']))
{
$u=$_POST['username'];
$pwd=$_POST['pwd'];
$q="select * from users where username='$u' and password='$pwd'";
$r=mysqli_query($c,$q);
$l=mysqli_fetch_assoc($r);
$n=mysqli_num_rows($r);
if($n>0)
{
$_SESSION['admin']=$l;
header("location:index.php");
}else echo 'Vos cordonnées sont incorrectes';	
}
?>
<html>
    <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>acceuil</title>   
    </head>
    <body>
<form method="post" action="" >
<table >
<tr>
<td>
<label id="for">username</label><br>    
<input type="text" name="username" id="for"   />  </td>
</tr>
<tr>
     

<td>
<label id="p">password</label><br>        
<input type="password" name="pwd"  id="p" /> </td>
</tr>
<td><br/>
<button type="submit" name="submit"><strong>submit</strong></button>
</td>
    </table>
        </form></body></html>