<?php
include "../config.php";
session_start();
				
if (!isset($_SESSION['user']))
header('location:connexu.php');
 if(isset($_GET['id']))
 {
	$id= $_GET['id'];
if(isset($_POST['submit']))
        {
if ($_FILES['pdfFile']['name']!='')  {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$im=$_FILES['pdfFile']['name'];
			$img=$_FILES['pdfFile']['tmp_name'];
			$ex=explode('.',$im);
			$ex=end($ex);
			  $imgn=md5(rand(0,1000).'_'.$im).'.'.$ex;
			  $imgn=md5(rand(0,1000).'_'.$im).'.'.$ex;
			     move_uploaded_file($img,'../upload/'.$imgn)
				   
             or die ("Error!!" );
			if($_FILES['pdfFile']['error'] == 0) {
				print "Pdf file uploaded successfully!";
				print "<b><u>Details : </u></b><br/>";
				print "File Name : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				print "File Size : ".$_FILES['pdfFile']['size']." bytes"."<br/>";
				print "File location :../upload/".$_FILES['pdfFile']['name']."<br/>";

			      $q2="update vente set   pdf='$imgn' where id=".$id;
				  $r2=mysqli_query($c,$q2); 
			      }
	              }
                  }

	
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
		}
	}
}

}




?>

<html>
<head>
<title>PHP Pdf file Upload script : Example</title>
</head>

<body>
<div style="padding: 20px; border: 1px solid #999">


<h2>Upload PDF File :</h2>
<form enctype="multipart/form-data" 	action="" method="post">
<p><input type="hidden" name="MAX_FILE_SIZE" value="200000" /> 
	
	<input type="file" name="pdfFile" /><br />
<br />
<input type="submit" value="upload!" name="submit" /></p>
</form>

</div>
</body>
</html>