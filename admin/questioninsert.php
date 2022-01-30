<?php
require_once('../Connections/examcon.php');
$quest=mysqli_real_escape_string($iqcon,$_POST['quest']);
$opta=mysqli_real_escape_string($iqcon,$_POST['opta']);
$optb=mysqli_real_escape_string($iqcon,$_POST['optb']);
$optc=mysqli_real_escape_string($iqcon,$_POST['optc']);
$optd=mysqli_real_escape_string($iqcon,$_POST['optd']);
$correct=mysqli_real_escape_string($iqcon,$_POST['correct']);
$mar=mysqli_real_escape_string($iqcon,$_POST['mar']);
$catname=mysqli_real_escape_string($iqcon,$_POST['catname']);
$subjt=mysqli_real_escape_string($iqcon,$_POST['subjt']);
$mar=mysqli_real_escape_string($iqcon,$_POST['mar']);
//mysqli_select_db($iqcon,"cbt_db");
if(($_FILES['profileImg']['name'])=='')
{
		$sql="INSERT INTO qtable (question,optiona,optionb,optionc,optiond,correctoption,mark,category,subject) VALUES ('$quest','$opta',
		'$optb','$optc','$optd','$correct','$mar','$catname','$subjt')";
		if(mysqli_query($iqcon,$sql))
		{
			
			$response['status'] = 'success';  
			$response['message'] = 'New Question Added';  
			header('Content-type: application/json'); 							
			echo json_encode($response);
		}
		else
		{
			
			die('Error : ' . mysqli_error($iqcon));
		}
}else if(($_FILES['profileImg']['name'])!='')
{
	$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["profileImg"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["profileImg"]["type"] == "image/png") || ($_FILES["profileImg"]["type"] == "image/jpg") || ($_FILES["profileImg"]["type"] == "image/jpeg")
) && ($_FILES["profileImg"]["size"] < (100000*1024))//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions))

{
	if ($_FILES["profileImg"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
	}
		else
		{
			if (file_exists("questionpics/" . $_FILES["profileImg"]["name"])) 
			{
			echo $_FILES["profileImg"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
			else
			{			
				$imgpath="questionpics/" . $_FILES["profileImg"]["name"];
				$sql="INSERT INTO qtable (question,optiona,optionb,optionc,optiond,correctoption,mark,category,subject,questimage) VALUES ('$quest','$opta', '$optb','$optc','$optd','$correct','$mar','$catname','$subjt','$imgpath')";
				$sourcePath = $_FILES['profileImg']['tmp_name']; // Storing source path of the file in a variable
						$targetPath = "questionpics/".$_FILES['profileImg']['name']; // Target path where file is to be stored
						move_uploaded_file($sourcePath,$targetPath) ;
						if(mysqli_query($iqcon,$sql))
							{
								
								$response['status'] = 'success';  
								$response['message'] = 'New Question Added';  
								header('Content-type: application/json'); 							
								echo json_encode($response);
							}
							else
							{
								
								die('Error : ' . mysqli_error($iqcon));
							}
			}
		}
}
}
?>
