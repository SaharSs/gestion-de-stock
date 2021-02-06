<?php
include "../config.php";
session_start();
ob_start();
if(isset($_GET['idi']))
{
$id=$_GET['idi'];	
$q6="select * from vente where id=".$id;
$r=mysqli_query($c,$q6);
}
?>

<table>
	<thead>
	  <tr>
      <th >id</th>
      <th >produit</th>
       </tr>
</thead>
	  <tbody>
	  <?php
      while($row12=mysqli_fetch_assoc($r))
       {
       ?>
		 <tr>
           <th ><?php echo  $row12['id']; ?></th>
           <td><?php echo  $row12['montant'];?></td>
  
			 </tr>
        <?php           
       }
             
	 
?>
	
  
    	</tbody>
 </table>
<?php
$content=ob_get_clean();
require __DIR__.'/../admin/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
$html2pdf->output();
?>




   