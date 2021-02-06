<?php
include "../config.php";
session_start();
ob_start();
?>

<table class="table">
	<thead>
	  <tr>
      <th >id</th>
      <th >produit</th>
      <th >prix</th>
      <th >qte</th>
      <th >total</th>
    </tr>
</thead>
	<tbody>
	 
	 	<?php
      foreach($_SESSION as $name=>$value)
            {
           if(substr($name,0,3)=="pr_")
             {
       ?>
		 <tr>
           <th ><?php echo  $value['id']; ?></th>
           <td><?php echo  $value['name'];?></td>
           <td><?php echo  $value['price'] ;?></td>
		   <td><?php echo $value['qte'];?></td> 
           <td><?php echo $value['total']; ?></td>
			 </tr>
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
<?php

$content=ob_get_clean();
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
$html2pdf->output();
?>




   