<?php
include "../config.php";
include "../header.php";

if(isset($_POST['btn-update']))
            {
            $n=$_POST['name'];
            $u=$_POST['username'];
            $p=$_POST['password'];
            $ro=$_POST['role'];
            $q="select * from users where username='$u' ";
            $r=mysqli_query($c,$q);
            $t=mysqli_num_rows($r);
	if($t==0)
	{
	if($_FILES['image']['name']!='')
	{
		
	$img=$_FILES['image']['name'];	
	$imge=$_FILES['image']['tmp_name'];
		$ex=explode('.',$img);
		$ex=end($ex);
	$imgn=md5(rand(0,1000).'_'.$img).'.'.$ex;
		move_uploaded_file($imge,"images/avatar/".$imgn) ;   
                        } else
                        {
                     echo "obl";
                        }
                       $s="insert into users (name,username,password,image,role)values('$n','$u','$p','$imgn','$ro')";
                       $r1=mysqli_query($c,$s);         
                     }else
                  header("location:add.php");        
		
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
<label id="u">username</label><br>     
<input type="text" name="username" id="u" /> </td>
</tr>
<tr>
    
   
<td>
<label id="p">password</label><br>     
<input type="password" name="password" id="p"   /> </td>
</tr>



<tr>
<td>
 <label id="i">image</label><br>
    
<input type="file" name="image" id="i"  /> </td>
</tr>
<tr>
    
<tr>    
<td>
<label for="role">role</label><br/>
<select name="role" id="role">
<option value="webmaster">webmaster</option>
<option value="admin">admin</option>
<option value="user">user</option>
</select>
</td>    
</tr>     
<tr>
<td><br/>
<button type="submit" name="btn-update"><strong>ajouter</strong></button>
</td>
</tr>
</table>
</form>
</div>    
                      <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
