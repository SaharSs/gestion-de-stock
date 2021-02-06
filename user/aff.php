<?php
include("../config.php");
session_start();
if(isset($_GET['id']))
{
$id=$_GET['id'];	
$q="select * from  factureachat  where id='$id'" ;
$r=mysqli_query($c,$q);
while ($row2 = mysqli_fetch_assoc($r)) {
$filePath = '../upload/'.$row2['pdf'];
if (file_exists($filePath)) {
    echo "The file $filePath exists";
} else {
    echo "The file $filePath does not exist";
    die();
}
$filename=$row2['pdf'];

header('Content-type:application/pdf');
header('Content-disposition: inline; filename="'.$filename.'"');
header('content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
@readfile($filePath);
}
}
					
    ?>
