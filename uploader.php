<?php 
error_reporting(0);

$change="";
$abc="";
$valido = $_POST['valido'];

 define ("MAX_SIZE","1000");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;
  
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 	$image =$_FILES["file"]["name"];
	$uploadedfile = $_FILES['file']['tmp_name'];
     
 
 	if ($image) 
 	{
 	
 		$filename = stripslashes($_FILES['file']['name']);
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		$size=filesize($_FILES['file']['tmp_name']);
		
 		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 			echo '<div class="msgdiv">Formato de imagen desconocido </div> ';
 			$errors=1;
 		}
		else if ($size > MAX_SIZE*1024)
		{
			echo '<div class="msgdiv">La imagen esta fuera del limite permitido</div> ';
			$errors=1;
		}
 		else
 		{
			if($extension=="jpg" || $extension=="jpeg" )
			{
			$uploadedfile = $_FILES['file']['tmp_name'];
			$src = imagecreatefromjpeg($uploadedfile);
			
			}
			else if($extension=="png")
			{
			$uploadedfile = $_FILES['file']['tmp_name'];
			$src = imagecreatefrompng($uploadedfile);
			
			}
			else 
			{
			$src = imagecreatefromgif($uploadedfile);
			}

			echo $scr;
			
			list($width,$height)=getimagesize($uploadedfile);
			
			
			$newwidth=50;
			$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			
			
			$newwidth1=25;
			$newheight1=($height/$width)*$newwidth1;
			$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
			
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			
			imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
			
			if($valido){
				$filename = "fotos/". $_FILES['file']['name'];
				imagejpeg($tmp,$filename,100);
				imagedestroy($src);
				imagedestroy($tmp);
			}
			else{
				$filename = "tmp/". $_FILES['file']['name'];
				//$filename1 = "tmp/small". $_FILES['file']['name'];
				imagejpeg($tmp,$filename,100);
				//imagejpeg($tmp1,$filename1,100);
				imagedestroy($src);
				imagedestroy($tmp);
				imagedestroy($tmp1);
				echo ' <div class="msgdiv">Visualización imágen</div>';
				echo '<img  class="tmp_image" src="'.$filename.'" width="50" height="50"/>';
			}
		}
	}
}

//If no errors registred, print the success message
 /*if(isset($_POST['Submit']) && !$errors) 
 {
 
   // mysql_query("update {$prefix}users set img='$big',img_small='$small' where user_id='$user'");
 	echo ' <div class="msgdiv">Image Uploaded Successfully!</div>';
	echo '<img src="'.$filename1.'" width="50" height="50"/>';
 }
 */
?>
<?php
    /*$valido = $_POST['valido'];
	$ruta = "fotos/";
	$carpeta="tmp/";
	if($valido){
		$name=$ruta.basename($_FILES['image']['name']);
    	move_uploaded_file($_FILES['image']['tmp_name'],$name);
	}
	else{
		$name=$carpeta.basename($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'],$name);
		echo '<img class="tmp_image" src="'.$name.'" width="50" height="50"/>';
	}*/
?>

