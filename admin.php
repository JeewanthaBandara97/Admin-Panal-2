<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
	{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
$sql ="SELECT Password FROM admin WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update admin set Password=:newpassword where UserName=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is not valid.";	
}
}
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      <link href="assets/css/btn.css" rel="stylesheet" />
     <link rel='icon' href='assets/favicon2.ico' rel="icon" type='image/x-icon'/ >
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
					     <h2>SIGIRI</h2>
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="#" style="color:#fff;"></a>  
                </span>
            </div>
        </div>
		
		
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				
                    <li >
                        <a href="home.php"><i class="fa fa-desktop"></i><font color="#ff4d4d">Dashboard</font>  </a>
                    </li>	
				
                    <li class="active-link" >
                        <a href="admin.php"><i class="fa fa-table"></i><font color="#ff4d4d">Admin</font></a>
                    </li>
					
                    <li>
                        <a><i class="fa fa-table"></i><font color="#ff4d4d">Sigiri Mortors</font></a>
                    </li>					
							<li>
								<a href="vehicle-brands.php"><i class="fa fa-arrow-right"></i>Vehicle Brands</a>
							</li>						
							<li>
								<a href="motors.php" ><i class="fa fa-arrow-right"></i>Insert Vehicle</a>
							</li>
							<li>
								<a href="motors-images.php" ><i class="fa fa-arrow-right"></i>Upload Vehicle Images</a>
							</li>

							
                    <li>
                        <a href="#" ><i class="fa fa-table "></i><font color="#ff4d4d">Sigiri Design</font></a>
                    </li>
							<li>
								<a href="design.php" ><i class="fa fa-arrow-right"></i>Insert Design</a>
							</li>
							
							
                    <li>
                        <a href="massages.php" ><i class="fa fa-table"></i><font color="#ff4d4d">Masseges</a></font></a>
                    </li>
                    <li>
                        <a href="other.php" ><i class="fa fa-table"></i><font color="#ff4d4d">Other</a></font></a>
                    </li>					
					<br>
					<center>
					<li>
                        <a href="logout.php" >LOGOUT</a>
                    </li>
					
                </ul>
            </div>
        </nav>
		
		
		
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>ADMINS</h2>   
                    </div>
                </div> 
                
<?php 
$msg=$_GET['msg'];

if($msg==success){
	echo '
	<div class="col-lg-12 ">
		<div class="alert alert-success">
			 <strong> Success </strong> Your Details succesfully changed
		</div>                      
	</div> 	
	';
}
else if($msg==error){
    echo '	
	<div class="col-lg-12 ">
		<div class="alert alert-danger">
			 <strong> Error </strong> Your Old password is not valid
		</div>                      
	</div>   	
	';
}
?>	


                 <!-- /. ROW  -->
                  <hr />
				  
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h5></h5>
						<center>
						<a href="add-new-user.php">
				        <button class="button" style="vertical-align:middle"><span>Add New Admin </span></button>
						</a>
					    <div style="overflow-x:auto;" >						
                        <table class="table table-striped table-bordered table-hover" width="100%" id="table-id">
                            <thead>
								   <tr>
									 <th>Id</th>
									 <th>User Name</th>
									 <th>Email</th>
									 <th align="center"><font color="red">Change<br> Password</font></th>
									 <th align="center"><font color="red">Delete</font></th>
								   </tr> 
                            </thead>
                            <tbody>
							
									  <?php $sql = "SELECT * FROM admin";
									  $query = $dbh -> prepare($sql);
									  $query->execute();
									  $results=$query->fetchAll(PDO::FETCH_OBJ);
									  $cnt=1;
									  if($query->rowCount() > 0)
									  {
									  foreach($results as $result)
									  {
										?> 							
							
                                    <td><?php echo htmlentities($result->id);?></td>
									<td><?php echo htmlentities($result->UserName);?></td>
									<td><?php echo htmlentities($result->Email);?></td>
                                    
									<td align="center">								     
										 <a href="edit-user.php?id=<?php echo $result->id;?>">
										 <i class="fa fa-pencil-square-o"style="font-size:25px;color:blue;padding:5px;"></i>
										 </a> 
										 
								    </td>							
									<td align="center">
									      <a href="delete-user.php?del=<?php echo $result->id;?>">
										  <i class="fa fa-times"style="font-size:25px;color:red;"></i>
										  </a>
									</td>
                                </tr>						
                               <?php }} ?></tbody>
                        </table>
					    </div>							
				



					  </center>
                    </div>
                </div>				  
				  
				  

				
                 <!-- /. ROW  -->           
             </div>
             <!-- /. PAGE INNER  -->
         </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2020  | Design by: <a href="" style="color:#fff;"  target="_blank">www.NSBM.com</a>
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
 


</body>
</html>
 <?php } ?>