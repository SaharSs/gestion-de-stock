<?php
include "../config.php";
include "../header.php";
session_start();
if (!isset($_SESSION['admin']))
header('location:connex.php');

  if(isset($_GET['id']))
       {
            $id=$_GET['id']; 

            $q1="select * from produit where id=".$id; 
            $r1=mysqli_query($c,$q1);
            while($row1=mysqli_fetch_assoc($r1))
            {
                $ne=$row1['name'];
                $f=$row1['fournisseur'];
					
       $q7="select  name from categories where id=".$row1['idc'];
        $r7=mysqli_query($c,$q7);
	     $row3=mysqli_fetch_assoc($r7);
			$j=$row3['name'];	
  	            $pru=$row1['prixu'];
                $prv=$row1['prixv'];
                $qte=$row1['qte'];
	         }
  }
if(isset($_POST['submit']))
{
$n=$_POST['name'];	
$qt=$_POST['qte'];	
$pr=$_POST['prix'];	
$prv=$_POST['prixv'];
$cat=$_POST['cat'];	
$f=$_POST['fourn'];	
	$b="select * from produit where name='$n' and id<>$id ";
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
$q12="select image from produit   where id='$id'";	
$s5=mysqli_query($c,$q12);
$row12=mysqli_fetch_assoc($s5);
if (is_file('images/avatar/'.$row12['image'])) 
       {
      if($row12['image']!=null)
      unlink('images/avatar/'.$row12['image']);    
       }
        $q8="UPDATE produit SET name='$n',idc='$cat',fournisseur='$f',prixu='$pr',prixv='$prv',image='$imgn',qte='$qt' WHERE id='$id'";
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
<input type="text" name="name" id="for"  value="<?= $ne ?>" />  </td>
</tr>
<tr>
     
<td>
<label id="u">qte</label><br>     
<input type="text" name="qte" id="u"  value="<?= $qte ?>" /> </td>
</tr>
<tr>
    
   
<td>
<label id="p">prix_u</label><br>     
<input type="password" name="prix" id="p" value="<?= $pru ?>"  /> </td>
</tr>
<tr>
    
   
<td>
<label id="p">prix_vente</label><br>     
<input type="password" name="prixv" id="p" value="<?= $prv ?>"  /> </td>
</tr>


<tr>
<td>
 <label id="i">image</label><br>
    
<input type="file" name="image" id="i"  /> </td>
</tr>
<tr>
    
<tr>

<td>
<?php	
$q5="select * from fournisseur ";
$r5=mysqli_query($c,$q5);
	   ?>
<label for="role">fournisseur</label><br/>
	
<select name="fourn" id="role" >
	<option value="<?php echo $f; ?>"><?php echo $f;  ?></option>
	<?php
	while($row1=mysqli_fetch_assoc($r5))
	{
	if($row1['name']!=$f)
	{
	?>
<option value="<?php echo $row1['name']; ?>"><?php echo $row1['name']; ; ?></option>
<?php
	}
	}	?>
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
	<option value="<?php echo $j; ?>"><?php echo $j; ?></option>
	<?php
	while($row2=mysqli_fetch_assoc($r3))
	{
	if($row2['name']!=$j)
	{
	?>
<option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
<?php
	}
	}
	?>
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
