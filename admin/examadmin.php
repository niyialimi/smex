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

    <title>SMEX Admin Dashboard</title>

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
          <h1 class="page-header">Dashboard</h1>
 
             <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                  <?php
			       $xquery="select count(*) as total from register";
				   $output=mysqli_query($iqcon,$xquery);
					   if(mysqli_num_rows($output))
						   {
							   while($rows=mysqli_fetch_assoc($output))
								   {
									   $total=$rows['total'];
									   echo $total;
								   }
						   }
				  ?>
                  </h3><span class="glyphicon glyphicon-user"></span>
                  <h5>Total Candidate(s) Registered</h5>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
          
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>
                  	<?php
			       $xquery="select count(*) as total from register where examstatus=1";
				   $output=mysqli_query($iqcon,$xquery);
					   if(mysqli_num_rows($output))
						   {
							   while($rows=mysqli_fetch_assoc($output))
								   {
									   $total=$rows['total'];
									   echo $total;
								   }
						   }
				  ?>
                  </h3><span class="glyphicon glyphicon-edit"></span>
                  <h5>Total Candidate(s) Taken Exams</h5>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>
                  <?php
			       $xquery="select count(*) as total from categorytab";
				   $output=mysqli_query($iqcon,$xquery);
					   if(mysqli_num_rows($output))
						   {
							   while($rows=mysqli_fetch_assoc($output))
								   {
									   $total=$rows['total'];
									   echo $total;
								   }
						   }
				  ?>
                  </h3><span class="glyphicon glyphicon-pencil"></span>
                  <h5>Total Category/Exam Type</h5>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

			<div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>
                  <?php
			       $xquery="select count(distinct subject) as total from qtable where subject !=''";
				   $output=mysqli_query($iqcon,$xquery);
					   if(mysqli_num_rows($output))
						   {
							   while($rows=mysqli_fetch_assoc($output))
								   {
									   $total=$rows['total'];
									   echo $total;
								   }
						   }
				  ?>
                  </h3><span class="glyphicon glyphicon-book"></span>
                  <h5>Total Number Of Subject</h5>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>

         
          
 <div class="row">
<div class="col-md-6 col-md-offset-3">
<img src="../image/main logo smex1.png" width="90%" height="90%" style="margin-top:10%; opacity:0.8;">
</div>
</div>
        </div>
      </div>
    </div>
<div class="footerlogo"></div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
    
  

</body></html>