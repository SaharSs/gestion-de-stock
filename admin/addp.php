<?php
include "../config.php";
include "../header.php";
session_start();
if (!isset($_SESSION['admin']))
header('location:connex.php');
if(isset($_POST['submit']))
{

$n=$_POST['name'];	
$qt=$_POST['qte'];	
$pr=$_POST['prix'];	
$prv=$_POST['prixv'];
$cat=$_POST['cat'];	
$f=$_POST['fourn'];	
$et=$_POST['etat'];	
	$b="select * from produit where name='$n' ";
	$r1=mysqli_query($c,$b);
	$p=mysqli_num_rows($r1);
if($p==0)
{
    if($_FILES['image']['name']!='')
                      {
                         $img=$_FILES['image']['name'];
                         $img1=$_FILES['image']['tmp_name'];
                         $ex=explode('.',$img);
                         $ex=end($ex);
                         $imgn=md5(rand(0,1000).'_'.$img).'.'.$ex;  
                         move_uploaded_file($img1,"images/avatar/".$imgn) ; 
		$q8="insert into produit(name,idc,fournisseur,prixu,prixv,qte,image,etat)values('$n','$cat','$f','$pr','$prv','$qt','$imgn','$et') ";
$r8=mysqli_query($c,$q8);
}else echo "obl";
	
}else echo "exist";
}
?>

<html>
<body>
	
<div class="container">
<form method="post" action="" enctype="multipart/form-data" >
<table >
<tr>
<td>
<label id="for">name</label><br>    
<input type="text" name="name" id="for"   />  </td>
</tr>
<tr>
     
<td>
<label id="u">qte</label><br>     
<input type="text" name="qte" id="u" /> </td>
</tr>
<tr>
    
   
<td>
<label id="p">prix_u</label><br>     
<input type="password" name="prix" id="p"   /> </td>
</tr>
<tr>
    
   
<td>
<label id="p">prix_vente</label><br>     
<input type="password" name="prixv" id="p"   /> </td>
</tr>


<tr>
<td>
 <label id="i">image</label><br>
    
<input type="file" name="image" id="i"  /> </td>
</tr>
<tr>
    
<tr>
<?php 
$q5="select * from fournisseur ";
$r5=mysqli_query($c,$q5);
	?>
<td>
	
<label for="role">fournisseur</label><br/>
	
<select name="fourn" id="role">
	<?php
	while($row1=mysqli_fetch_assoc($r5))
	{
	
	?>
<option value="<?php echo $row1['name']; ?>"><?php echo $row1['name']; ?></option>
<?php
	}
		?>
</select>
</td>    
</tr> 
<tr>
<?php 
$q1="select  * from categories ";
$r3=mysqli_query($c,$q1);
	?>
<td>
	
<label for="role">categories</label><br/>
	
<select name="cat" id="role">
	<?php
	while($row2=mysqli_fetch_assoc($r3))
	{
	
	?>
<option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
<?php
	}
	?>
</select>
</td>    
</tr> 
<tr>    
<td>
<label for="role">etat</label><br/>
<select name="etat" id="role">
<option value="panne">panne</option>
<option value="reparé">résparé</option>
<option value="user">cassé</option>
<option value="user">normal</option>
</select>
</td>    
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
