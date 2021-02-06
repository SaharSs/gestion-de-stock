<?php
include "../config.php";
include "../header.php";
session_start();
if (!isset($_SESSION['admin']))
header('location:connex.php');
if(isset($_POST['btn-update']))

            {
            $cat=$_POST['cat'];
        
 
                       $s="insert into categories (name)values('$cat')";
                       $r1=mysqli_query($c,$s);         
                  }
	 ?>


<html>
<body>
	
<div class="container">
<form method="post" action="" enctype="multipart/form-data">
<table >
<tr>
<td>
	
<label id="for">cat</label><br>    
<input type="text" name="cat" id="for"   />  </td>
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
