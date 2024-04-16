<?php 

	if(isset($_POST["btnSubmit"]))
	{
		// print_r($_FILES["testfile"]);
		// try
		// {
			
		// }catch(Exception $ex)
		// {
		// 	echo $ex;
		// }

		if(move_uploaded_file($_FILES["testfile"]["tmp_name"], "../uploads/".$_FILES["testfile"]["name"]))
		{
			echo "moved".$_FILES["testfile"]["name"];
		}

	}

 ?>





 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	 <form method="POST" action="testx.php" enctype="multipart/form-data">
 	 	<input type="file" name="testfile">
 	 	<input type="submit" name="btnSubmit" value="Upload" >
 	 </form>
 </body>
 </html>