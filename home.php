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
    <title> Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />    <link rel='icon' href='assets/favicon2.ico' rel="icon" type='image/x-icon'/ >
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
				
                    <li class="active-link">
                        <a href="home.php"><i class="fa fa-desktop"></i><font color="#ff4d4d">Dashboard</font>  </a>
                    </li>					
                    <li>
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
                         <a href="#" ><i class="fa fa-table"></i><font color="#ff4d4d">Sigiri Design</font></a>
                    </li>
							<li>
								<a href="design.php" ><i class="fa fa-arrow-right"></i>Insert Design</a>
							</li>
							
							
                    <li>
                        <a href="massages.php" ><i class="fa fa-table"></i><font color="#ff4d4d">Masseges</font></a>
                    </li>
                    <li>
                        <a href="other.php" ><i class="fa fa-table "></i><font color="#ff4d4d">Other</a></font></a>
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
                     <h2>OVERVIEW</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
<!-- *********************************************************************************************************** -->				  
                 <div class="row">
				 
                    <div class="col-lg-12 ">
                        <div class="alert alert-success">
                             <strong>Welcome </strong> Total Summery...<i class="fa fa fa-hand-o-down fa-1x"></i>
                        </div>                      
                    </div>               
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Admins </h5>
                        <div class="alert alert-info text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <h3>							
							  <?php								  
									$query	= "SELECT * FROM admin";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>								  
							</h3>
                             
                        </div>
						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Vehicles </h5>
                        <div class="alert alert-info text-center">
                            <i class="fa fa-car fa-5x"></i>
                            <h3>							
							  <?php								  
									$query	= "SELECT * FROM vehicles";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>								  
							</h3>
                             
                        </div>
						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Vehicle Brands</h5>
                        <div class="alert alert-info text-center">
                            <i class="fa fa-anchor fa-5x"></i>
                            <h3>							
							  <?php								  
									$query	= "SELECT * FROM brands";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>								  
							</h3>
                             
                        </div>
						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Designs </h5>
                        <div class="alert alert-info text-center">
                            <i class="fa fa-glass fa-5x"></i>
                            <h3>							
							  <?php								  
									$query	= "SELECT * FROM design";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>								  
							</h3>
                             
                        </div>
						
                    </div>							
                 </div> 
				 
				 
				 
<!-- *********************************************************************************************************** -->				 
                <div class="row">
				 
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>SIGIRI MORTORS </strong><i class="fa fa fa-hand-o-down fa-1x"></i>
                        </div>                      
                    </div> 
					
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Toyota </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Toyota' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>	
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Nissan </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Nissan' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>						
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Honda </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Honda' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Suzuki </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Suzuki' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Mitsubishi </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Mitsubishi' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Maruti-Suzuki </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Maruti-Suzuki' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>BMW </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='BMW' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Audi </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Audi' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Kia </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Kia' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Micro </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Micro' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Landrover </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Landrover' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Mercedes-Bens </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Mercedes-Bens' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Mazda </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Mazda' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Hyundai </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-taxi  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Hyundai' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>                    
                    
                    
                 </div> 
<!-- Mitsubishi Maruti-Suzuki BMW Audi Kia Micro Landrover  Mercedes-Bens Mazda Hyundai  -->				 
<!-- *********************************************************************************************************** -->
                <div class="row">
				 
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>SIGIRI DESIGN </strong><i class="fa fa fa-hand-o-down fa-1x"></i>
                        </div>                      
                    </div> 
					
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Granite Items</h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-glass fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM design  WHERE Type='GI' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>	
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>	
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Other Items </h5>						
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-glass  fa-5x"></i>
                                <h3>
							  <?php								  
									$query	= "SELECT * FROM design  WHERE Type='OI' ";
									$query_run = $dbh->query($query);
									$query_exec = $query_run->rowCount();
									echo "$query_exec ";						  			  
							  ?>	
								</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">                    
                            </div>
                        </div>						
                    </div>						
	
<!-- *********************************************************************************************************** -->

				 
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