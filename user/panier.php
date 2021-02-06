<?php
include "../config.php";
session_start();
if (!isset($_SESSION['user']))
header('location:connexu.php');



	if(isset($_GET['message']))
	{
		echo"<div class='alert alert-danger'>".$_GET['message']."</div>";
		
	}



	
?>


  <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/all.min.css">	
	
<table class="table">
	 <thead>
	  <tr>
      <th scope="col">id</th>
      <th scope="col">produit</th>
      <th scope="col">prix</th>
      <th scope="col">qte</th>
      <th scope="col">total</th>
     

    </tr>
	</thead>
<tbody>
	  <tr>
	 	<?php
          foreach($_SESSION as $name=>$value)
            {
           if(substr($name,0,3)=="pr_")
             {
           ?>	 
          <th scope="row"><?php echo $value['id']?></th>
          <td><?php echo $value['name']?></td>
          
           <td><?php echo $value['price']?></td>
		   <td><?php echo $value['qte']?></td> 
           <td><?php echo $value['total']?></td>
           
           
           <td><a href="deletepa.php?id=<?php echo $value['id'];?>&prix=<?php echo $value['total'];?>"><i class="fa fa-trash" ></i></a></td>
           </tr><br>
	
             <?php
             }
             }
		  	
		     ?>
	
	<tr>
		
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td>montant total</td>	
	<td> <?php echo $_SESSION['totales']?></td>
	</tr>
    </tbody>
	
 </table>

<a type="submit" href="uploadachat.php" >upload achat</a>




<a href="../admin/pdf.php">valider</a>	
