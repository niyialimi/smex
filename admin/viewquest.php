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

   <title>SMEX View Questions</title>

   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">	
    <link rel="stylesheet" href="../css/style.css">	
   <link rel="stylesheet" type="text/css" href="../asset/DataTables/datatables.min.css">
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
          <h1 class="page-header">Question</h1>

            <div id="container" align="center"><center>

</center>
<div id="page" style="width:94%;">
  
<div id="table">
<form action="questioninsert.php" method="post" enctype="multipart/form-data">
<div class="table-responsive">
<table width="90%" class="table table-striped table-bordered" id="tab">
<thead>
  <tr style="font-weight:bolder;">
  	<th>S/N</th>    
    <th>Question</th>
    <th>Category</th>
    <th>Subject</th>
    <th>Mark</th>
    <th>Option A</th>
    <th>Option B</th>
    <th>Option C</th>   
     <th>Option D</th>    
    <th>Correct Option</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  <tr>
   <?php
   $sn=1;
   $newquery="select * from qtable";
   $output=mysqli_query($iqcon,$newquery);
   if(mysqli_num_rows($output))
   {
	   while($rows=mysqli_fetch_assoc($output))
	   {
		   
		$_SESSION['qid']=$rows['qid'];
		
  ?>
   	<td><?php echo $sn; ?></td>
    <td><?php echo substr($rows['question'], 0, 100)."..."; ?></td>
    <td><?php echo substr($rows['category'], 0, 20)."..."; ?></td>
    <td><?php echo substr($rows['subject'], 0, 20)."..."; ?></td>
     <td><?php echo substr($rows['mark'], 0, 20)."..."; ?></td>  
    <td><?php echo substr( $rows['optiona'], 0, 20)."..."; ?></td>
    <td><?php echo  substr($rows['optionb'], 0, 20)."..."; ?></td>
    <td><?php echo  substr($rows['optionc'], 0, 20)."..."; ?></td>
     <td><?php echo  substr($rows['optiond'], 0, 20)."..."; ?></td>
    <td><?php echo  substr($rows['correctoption'], 0, 20)."..."; ?></td>
    <td><a href="questedit.php?id=<?php echo $_SESSION['qid']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a><a href="#" data-id="<?php echo $_SESSION['qid']; ?>" class="btn btn-danger" id="deletebut"><i class="fa fa-trash"></i></a></td>
    
    
    <!--td>
    <!--form method="post" action="moredetail.php">
    <button type="submit" id="btnsub" name="btnsubmit" class="btn btn-primary">More Detail</button>&nbsp;
    <a href="acctedit.php?id=<?php echo $_SESSION['mem_id']; ?>" class="btn btn-info">Edit</a>
    <input type="hidden" name="myid" value="<?php echo $_SESSION['mem_id']; ?>" />
    </form>
    </t-->
  </tr>
    <?php
	$sn++;
	   }
   }
	?>
    </tbody>
</table>
</div>
</form>
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
    <!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
 
<script type="text/javascript" charset="utf8" src="../asset/DataTables/datatables.min.js"></script>
 <script>
 $(document).on('click','#deletebut', function(e){	 
	   e.preventDefault();   
	    var parent = $(this).closest("tr"); 
		
	    if(confirm("Are you sure you want to delete this Question?")){
        var qid      = $(this).data('id');
		window.location.href='deletescript.php?qid='+qid;
	
    }
    else{
        return false;
    }
	
	  
  });
  
  $(document).ready( function () {
    $('#tab').DataTable();
} );
 </script>   
  

</body></html>