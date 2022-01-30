<?php 
require_once('../Connections/examcon.php');
session_start();
//mysqli_select_db($iqcon,"cbt_db");
if (!isset ($_SESSION['username']) && !isset( $_SESSION['password']))
{
	header("Location:index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--link rel="icon" href="http://getbootstrap.com/favicon.ico"-->

    <title>SMEX Print</title>

   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">	
    <link rel="stylesheet" href="../css/style.css">	
   
    <link href="../css/dashboard.css" rel="stylesheet">
	<link rel="shortcut icon" href="../image/logo.png">
   
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SMEX</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Exam Admin</a></li>
            
          </ul>
          <!--form class="navbar-form navbar-right">
            <input class="form-control" placeholder="Search..." type="text">
          </form-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="examadmin.php"><span style="padding-right:5px;" class="glyphicon glyphicon-dashboard"></span>Dashboard</a></li>
                <li><a href="reg.php"><span style="padding-right:5px;" class="glyphicon glyphicon-user"></span>Add Candidate</a></li>
                <li><a href="viewcand.php"><span style="padding-right:5px;" class="glyphicon glyphicon-eye-open"></span>View Candidates</a></li>
                <li><a href="createcat.php"><span style="padding-right:5px;" class="glyphicon glyphicon-pencil"></span>Add Exam Category</a></li>
                 <li><a href="questionpage.php"><span style="padding-right:5px;" class="glyphicon glyphicon-pencil"></span>Add Question</a></li>
                 <li><a href="viewquest.php"><span style="padding-right:5px;" class="glyphicon glyphicon-eye-open"></span>View Questions</a></li>
                 <li><a href="changepwd.php"><span style="padding-right:5px;" class="glyphicon glyphicon-lock"></span>Change Password</a></li>
                 <li><a href="logout.php"><span style="padding-right:5px;" class="glyphicon glyphicon-off"></span>Logout</a></li>
          </ul>
         
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Management Print</h1>

            <div id="container" align="center"><center>

</center>
<div id="page" style="margin-top:5px">
<div class="table-responsive">
                  
                <form action="" class="" id="showattendform"  enctype="multipart/form-data" method="post" role="form">                
                	<div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Candidate Result</h3>
                      </div> 
                      <div class="panel-body" id="printarea">  
                      <div align="center"><img src="../image/main logo smex1.png" width="250px" height="100px"><br><?php echo '<strong>Atanda CBT Center</strong><br>'.'<strong>Oluyole Ibadan, Nigeria</strong><br>'.'Email: xxx@m.com Tel 080XXXXXXXXX';?></div><hr><h4 align="center">Candidate Score Summary</h4>                   
                     <table width="70%" height="104" class="table table-striped table-bordered" id="tab">
<thead>
  <tr style="font-weight:bolder;">
  	<td width="6%">S/N</td>    
    <td width="12%">Subject</td>
    <td width="9%">Score</td>
    
  </tr>
</thead>
<tbody>

        <?php 
		$sn=1;$total=0;
			//echo "Total Percentage= ".(round(($mark/$rowCount)*100))."%"; 
			$resel="select * from scoretab where exam_code='".$_POST['code']."' ";
			$resultn=mysqli_query($iqcon,$resel);
				if (mysqli_num_rows($resultn))
				{
					while($rows=mysqli_fetch_assoc($resultn))
					{
						$total=$total+$rows['exam_score'];
			?>
            <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $rows['exam_subject']; ?></td>
   			 <td><?php echo $rows['exam_score']; ?></td>
              </tr>
            <?php 
			$sn++;			
					}
				}

		else{echo '<td colspan="3">No Report Generated</td>';}
		?>
<tr><td align="right" colspan="2"><strong>Total</strong></td>
<td><?php echo $total; ?></td></tr>
 </tbody>
 </table>
                    </div>
       </div>          
             
              </form>
             	
                  <!--a href="#" id="myprintme" class="btn btn-info pull-right"><i class="fa fa-print"></i> Print</a-->
                 
                
                         </div>
</div>
</div>
            
          
           
          
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jQuery-2.1.4.min.js"></script>    
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/jquery-printme.js"></script>
  
<script>
$(document).ready(function () {
			$("#printarea").printMe({
				"path" : ["../bootstrap/css/bootstrap.min.css","../dist/css/schapp.min.css"]
				//"title" : "Student Report Sheet"
				});
		
});
</script>
</body></html>