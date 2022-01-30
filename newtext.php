<?php
require_once('admin/Connections/examcon.php');
session_start();

if (!isset ($_SESSION['examcode']) && !isset( $_SESSION['email']))
{
	header("Location:index.php");
	exit();
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>::SmartExam Question Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/teststyle.css" rel="stylesheet" media="screen">
        <!--link href="css/userstyle.css" rel="stylesheet" type="text/css" media="screen"-->
		<link rel="shortcut icon" href="image/logo.png">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
		
		</style>
	</head>
	<body>
	    <header>
        
            <p class="text-center">
                Welcome : <?php if(!empty($_SESSION['firstname'])){echo "<strong>".ucfirst($_SESSION['lastname'])." ".ucfirst($_SESSION['firstname'])."</strong>";}?><span class="pull-right" style="font-size:18px; font-weight:bold; margin-right:10%;" id="time"></span><?php
		$timsel="select cat_duration from categorytab where cat_name='".$_POST['desiredexam']."' ";
		$result=mysqli_query($iqcon,$timsel);
			if (mysqli_num_rows($result))
			{
				while($rows=mysqli_fetch_assoc($result))
				{
					echo '<input type="hidden" name="timing" id="timing" value="'.$rows['cat_duration'].'">';
				}
				
			}
		?><!--input align="middle" style="height:30px; width:60px; text-align:center; font-size:14px; color:#FFF; background-color:transparent; border:none; margin-right:50%; font-weight:600" type="text" name="d2" id="timer"-->
            </p>
        </header>

		<div class="container question">
        
			<div class="col-xs-12 col-sm-8 col-md-8 col-xs-offset-4 col-sm-offset-3 col-md-offset-3">
				<p>
					<strong style="color:#036">You Are Currently Writing <?php echo $_POST['desiredexam'] ?></strong>
                    
				</p>
				<hr>
				<form class="form-horizontal" enctype="multipart/form-data" role="form" id='login' method="post" action="result.php">
					<?php 
					$res = mysqli_query($iqcon,"SELECT * FROM qtable where (category = '".$_POST['desiredexam']."' and subject='".$_POST['subject']."') order by rand() limit 50") or die(mysqli_error($iqcon));
                    $rows = mysqli_num_rows($res);
					$i=1;$i2=0;
                while($result=mysqli_fetch_array($res)){?>
				
                    <?php if($i==1){?>         
                    <div id='question<?php echo $i;?>' class='cont'>
                    <input style="visibility:hidden;" type="checkbox" name="quest[]" value="<?php echo $result['qid']; ?>" checked="checked"/>
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['question'];?></p>
                     <?php
					if ($result['questimage']!='')
					{
						echo '<div align="center" style="cursor:pointer;color:black;"><img src="admin/'.$result['questimage'].'" class="myImg" width="160" height="70" onclick="showimage()"/><br>Click to Enlarge Image</div>';
					}
					?>
                   <label> <input type="radio" value="<?php echo $result['optiona'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optiona'], 0,200);?></label>
                   <br/>
                   <label> <input type="radio" value="<?php echo $result['optionb'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optionb'], 0,200);?></label>
                    <br/>
                    <label><input type="radio" value="<?php echo $result['optionc'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optionc'], 0,200);?></label>
                    <br/>
                    <label><input type="radio" value="<?php echo $result['optiond'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optiond'], 0,200);?></label>
                   
                    <!--input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/-->                                                                      
                    <br/>
                    <input type="hidden" name="mark[]" id="mark" value="<?php echo $result['mark'];?>" />
                    <input type="hidden" name="c[]" id="correctoption" value="<?php echo $result['correctoption'];?>" />
                   <p> <button id='<?php echo $i;?>' class='next btn btn-primary' type='button'>Next</button></p>
                   <p><strong style="color:#036"><?php echo $i." of ". $rows." | ".$result['subject']; ?></strong></p>
                    </div>     

                     <?php }elseif($i<1 || $i<$rows){?>

                       <div id='question<?php echo $i;?>' class='cont'>
                       <input style="visibility:hidden;" type="checkbox" name="quest[]" value="<?php echo $result['qid']; ?>" checked="checked"/>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question'];?></p>
                     <?php
					if ($result['questimage']!='')
					{
						echo '<div align="center" style="cursor:pointer;color:black;"><img src="admin/'.$result['questimage'].'" class="myImg" width="160" height="70" onclick="showimage()"/><br>Click to Enlarge Image</div>';
					}
					?>
                     <label> <input type="radio" value="<?php echo $result['optiona'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optiona'], 0,200);?></label>
                   <br/>
                   <label> <input type="radio" value="<?php echo $result['optionb'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optionb'], 0,200);?></label>
                    <br/>
                    <label><input type="radio" value="<?php echo $result['optionc'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optionc'], 0,200);?></label>
                    <br/>
                    <label><input type="radio" value="<?php echo $result['optiond'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optiond'], 0,200);?></label>
                    <!--input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/-->                                                                      
                    <br/>
                    <input type="hidden" name="mark[]" id="mark" value="<?php echo $result['mark'];?>" />
                    <input type="hidden" name="c[]" id="correctoption" value="<?php echo $result['correctoption'];?>" />
                    <p><button id='<?php echo $i;?>' class='previous btn btn-primary' type='button'>Previous</button>                    
                    <button id='<?php echo $i;?>' class='next btn btn-primary' type='button' >Next</button></p>
                    <p><strong style="color:#036"><?php echo $i." of ". $rows." | ".$result['subject']; ?></strong></p>
                    </div>

                   <?php }elseif($i==$rows){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                    <input style="visibility:hidden;" type="checkbox" name="quest[]" value="<?php echo $result['qid']; ?>" checked="checked"/>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question'];?></p>
                     <?php
					if ($result['questimage']!='')
					{
						echo '<div align="center" style="cursor:pointer;color:black;"><img src="admin/'.$result['questimage'].'" class="myImg" width="160" height="70" onclick="showimage()"/><br>Click to Enlarge Image</div>';
					}
					?>
                     <label> <input type="radio" value="<?php echo $result['optiona'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optiona'], 0,200);?></label>
                   <br/>
                   <label> <input type="radio" value="<?php echo $result['optionb'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optionb'], 0,200);?></label>
                    <br/>
                    <label><input type="radio" value="<?php echo $result['optionc'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optionc'], 0,200);?></label>
                    <br/>
                    <label><input type="radio" value="<?php echo $result['optiond'];?>" name="r<?php echo $i2;?>" id="radio1_<?php echo $result['qid'];?>"/><?php echo substr($result['optiond'], 0,200);?></label>
                    <!--input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/-->                                                                      
                    <br/>
					<input type="hidden" name="mark[]" id="mark" value="<?php echo $result['mark'];?>" />
                    <input type="hidden" name="c[]" id="correctoption" value="<?php echo $result['correctoption'];?>" />
                    <p><button id='<?php echo $i;?>' class='previous btn btn-primary' type='button'>Previous</button> 
                   
                    <button id='submit-quiz' class='next btn btn-primary' type='submit' name="submitquiz">Finish</button></p>
                    <p><strong style="color:#036"><?php echo $i." of ". $rows." | ".$result['subject']; ?></strong></p>
                    </div>
					<?php } $i++;$i2++;} ?>
				<input type="hidden" value="<?php echo $_POST['subject']; ?>" id="subject" name="subject" />
				</form>
			</div>
		</div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
       <footer>
            <p class="text-center" id="foot">
                SMEX by <img src="image/Main-Logo-small.png" width="127" height="50" /> For Atanda CBT Center
            </p>
        </footer>
        <!--image modal-->
        <div id="myModal" class="modal">

          <!-- The Close Button -->
          <span class="close">&times;</span>
        
          <!-- Modal Content (The Image) -->
          <img class="modal-content" id="img01">
        
          <!-- Modal Caption (Image Text) -->
          <div id="caption"></div>
        </div>
        <!--modal end-->

<!--?php

if(isset($_POST[1])){ 
   $keys=array_keys($_POST);
   $order=join(",",$keys);

   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;

   $response=mysql_query("select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());
   $right_answer=0;
   $wrong_answer=0;
   $unanswered=0;
   while($result=mysql_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }

   }

   echo "right_answer : ". $right_answer."<br>";
   echo "wrong_answer : ". $wrong_answer."<br>";
   echo "unanswered : ". $unanswered."<br>";
}
?-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jQuery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
  <script>
  function startTimer(duration, display) {	
    
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = 'Time Remaining: '+minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
			$('#submit-quiz').trigger('click');
		alert('Thank You, Your is Up and the Exam has Been Automatically Submitted');
        }
    }, 1000);
}

window.onload = function () {
	var t=document.getElementById('timing').value*60,
        display = document.querySelector('#time');
    startTimer(t, display);
};
  </script>
 <!--script> 
<!-- 
// 
var tim=document.getElementById('timing').value;
 var sec=0; 
 var mini=tim; 
 //document.getElementById('timer').value='30';

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
	//document.getElementById('time').value=mini+"."+sec;
   // document.quiz.d2.value=mini+"."+sec;
   //alert(seconds+"."+milisec)
	if(mini <= 0 && sec<=0)
	{
		//alert("Allocated time is up. Submitting answers to server...");
		//quiz.submit();
		//document.getElementById("quiz").submit();		
		
		
		
	
	} 
    setTimeout("display()",1000); 
} 
display(); 
> 
</script-->

		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');

		 $(document).on('click','.next',function(){


		     element=$(this).attr('id');
			// alert(element);
		     last =parseInt(element); // parseInt(element.substr(element.length - 1));			 
		     nex=last+1;
			// alert(last);
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
		 });

		 $(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element);//parseInt(element.substr(element.length - 1));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });

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
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
	}
 }
 </script> 
	</body>
</html>
