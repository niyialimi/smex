<?php
require_once('Connections/examcon.php');
session_start();

if (!isset ($_SESSION['examcode']) && !isset( $_SESSION['email']))
{
	header("Location:index.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::SmartExam Question Page</title>
<link href="css/userstyle.css" rel="stylesheet" type="text/css" media="screen">
<link rel="shortcut icon" href="image/logo.png">
<?php
$timsel="select cat_duration from categorytab where cat_name='".$_POST['desiredexam']."' ";
$result=mysqli_query($iqcon,$timsel);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			echo '<input type="hidden" name="timing" id="timing" value="'.$rows['cat_duration'].'">';
		}
	}
?>

</head>

<body onload="display()">
	<div style="margin-top:0px; margin-left:45%;"><input align="middle" style="height:30px; width:60px; text-align:center; font-size:16px;" type="text" name="d2" id="timer"> </div>
	<div id="page-wrap">

		
		<form action="result.php" method="post" id="quiz">
		
           <ul id="test-questions">
   <?php 
		//session_start();
		//require_once('Connections/examcon.php');
		$random = rand(0, 100);
		$result="SELECT * FROM qtable where (category = '".$_POST['desiredexam']."' and subject='".$_POST['subject']."') order by rand() limit 50";	
		//mysqli_select_db($iqcon,"cbt_db");
		$result1 = mysqli_query($iqcon,$result) or die(mysqli_error($iqcon));
		$num = mysqli_num_rows($result1);
		$count=0;$A="(A) ";$B=" (B) ";$C=" (C) ";$D=" (D) ";$E=" (E) ";
		 $counter=0;
		// $mark=0;
		  $color="white";
		  if(mysqli_num_rows($result1))
		  {
			  while($row = mysqli_fetch_array($result1))
				{
				/*if($color == "white")
				{
					$color = "#79BAEC";
				}
				else
				{
					$color = "white";
				}*/			
				$id=$row['qid'];
				$count++;
			
?>
                
                <li>
               	
                    <!--div class="quiz-overlay"></div-->
                    
                    <input style="visibility:hidden;" type="checkbox" name="quest[]" value="<?php echo $row['qid']; ?>" checked="checked"/>
                    <h3 style="color:#000"><font><?php echo $count.") ". $row['question'] ?></font></h3>               
                    <?php
					if ($row['questimage']!='')
					{
						echo '<div align="center" style="cursor:pointer;color:black;"><img src="admin/'.$row['questimage'].'" class="myImg" width="160" height="85" onclick="showimage()"/><br>Click to Enlarge Image</div>';
					}
					?>
                    <div class="mtm">
                  
                        <input type="radio" name="r<?php echo $counter;?>" id="question" value="<?php echo $row['optiona'];?>" />
                        <label for="question-1-answers-A" class="labelrd">A)  <?php echo substr($row['optiona'], 0,150)."...";?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="r<?php echo $counter;?>" id="question" value="<?php echo $row['optionb'];?>" />
                        <label for="question-1-answers-B" class="labelrd">B)  <?php echo substr($row['optionb'], 0,150)."...";?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="r<?php echo $counter;?>" id="question" value="<?php echo $row['optionc'];?>" />
                        <label for="question-1-answers-C" class="labelrd">C)  <?php echo substr($row['optionc'], 0,150)."...";?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="r<?php echo $counter;?>" id="question" value="<?php echo $row['optiond'];?>" />
                        <label for="question-1-answers-D" class="labelrd">D)  <?php echo substr($row['optiond'], 0,150)."...";?></label>
                    </div>
                    
                     
                    <input type="hidden" name="mark[]" id="mark" value="<?php echo $row['mark'];?>" />
                    <input type="hidden" name="c[]" id="correctoption" value="<?php echo $row['correctoption'];?>" />
                    
                     <p class="quiz-progress">&nbsp;&nbsp;&nbsp;&nbsp; <input type="button" class="fwrd" value="  Next >" id="" name="next" /> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $count." of ". $num; ?></p>
                </li>
                <?php
				$counter++;
				 }
			  }
			  else
			  {
				  echo '<li><div align="center"><label class="labeld">No Question Set For This Exam Type or Subject Yet</label><p align="center"><a href="script/logout.php">Logout</a><p></div></li>';
				
			  }
				?>
                 <li>
                    <!--div class="quiz-overlay"></div-->
                    <h3 class="final" align="center">Thats all for now; Please Click "<strong>Submit</strong>" to Submit Finally or click "<strong>Continue With New Exam</strong>" to take another exam</h3>                    
                    <input type="hidden" value="<?php echo $_POST['subject']; ?>" id="subject" name="subject" />
                    <input type="submit" value="Submit Exam" id="submit-quiz" name="submitquiz" />                    
                    <input type="submit" class="newexam" value="Continue With New Exam" id="submit-quiz" name="submitpartquiz" />
                </li>                
            </ul>
		
		</form>
 <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>     
</div>
<script src="js/jQuery-2.1.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>        
<script>
           (function($) {
              var timeout= null;
              var $mt = 0;
              $("#quiz .fwrd").click(function(){
                clearTimeout(timeout);
                timeout = setTimeout(function(){ 
                    $mt = $mt - 430;				  
                    $("#test-questions").css("margin-top", $mt); 
                }, 333);
				
				
              });
           }(jQuery))
    </script>
    <script> 
<!-- 
// 
var tim=document.getElementById('timing').value;
 var sec=0; 
 var mini=tim; 
 document.getElementById('timer').value='30';

function display(){ 

 if (sec<=0){ 
    sec=60; 
    mini-=1; 
 } 
 if (mini<=-1){ 
    sec=0; 
    mini+=1; 
 } 
 else 
    sec-=1; 
	document.getElementById('timer').value=mini+"."+sec;
   // document.quiz.d2.value=mini+"."+sec;
   //alert(seconds+"."+milisec)
	if(mini <= 0)
	{
		alert("Allocated time is up. Submitting answers to server...");
		quiz.submit();
	} 
    setTimeout("display()",1000); 
} 
display(); 
--> 
</script>
 <script>
 var id;
 function showimage(id)
 {
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementsByClassName('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

showModal = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
for (var i = 0; i < img.length; i++) {
    img[i].addEventListener('click', showModal);
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
 }
 </script>  
</body>
</html>