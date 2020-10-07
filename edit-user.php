<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
      
$id=$_POST['id'];	     
$username=$_POST['username'];
$email=$_POST['email'];
$npassword=$_POST['npassword'];
$opassword=$_POST['opassword'];

$sql ="SELECT Password FROM admin WHERE Password=:opassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':opassword', $opassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

        if($query -> rowCount() > 0)
        {	
		$sql="UPDATE admin 
			  SET  UserName='$username',Email='$email',Password='$npassword' 
			  WHERE id='$id' ";

		$query = $dbh->prepare($sql);

		$query->bindParam(':username',$username,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		$query->bindParam(':npassword',$npassword,PDO::PARAM_STR);

		$query->execute();
		$lastInsertId = $dbh->lastInsertId();

		header('Location: admin.php?update_success&msg=success');
		}
		else{
        header('Location: admin.php?Old_password_does_not_match&msg=error');
		}
}
?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGIRI</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
       <link rel="stylesheet" href="assets/css/form.css">     <link rel='icon' href='assets/favicon2.ico' rel="icon" type='image/x-icon'/ >
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
                        <a href="#" ><i class="fa fa-table"></i><font color="#ff4d4d">Sigiri Design</font></a>
                    </li>
							<li>
								<a href="design.php" ><i class="fa fa-arrow-right"></i>Insert Design</a>
							</li>
							
							
                    <li>
                        <a href="massages.php" ><i class="fa fa-table "></i><font color="#ff4d4d">Masseges</font></a>
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
                     <h2>Update Details </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
				  
  <div class="wrapper">
  <div class="title">
    
  </div>
  <div class="form">
  
    <?php 
$id=intval($_GET['id']);

$sql ="SELECT * from admin where admin.id=:id";

$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
?>	
  
          <form name="insert-form" id="contact-form"  method="POST">        
				<div class="inputfield">
				  <label>ID</label>
				  <input type="hidden" name="id" class="input" value="<?php echo htmlentities($result->id);?>" ><?php echo htmlentities($result->id);?>
			   </div>   
			   
			 <div class="inputfield">
                  <label>User Name</label>
                  <input type="text" name="username" class="input" value="<?php echo htmlentities($result->UserName);?>" required>
               </div>  
			   
               <div class="inputfield">
                  <label>Email</label>
                  <input type="hidden" name="email" class="input" value="<?php echo htmlentities($result->Email);?>" ><?php echo htmlentities($result->Email);?>	
               </div>  
			   
               <div class="inputfield">
                  <label>Old Password</label>
                  <input type="text" name="opassword" class="input"  required>
               </div>  
			   
               <div class="inputfield">
                  <label>New Password</label>
                  <input type="text" name="npassword" class="input" value="" required>
               </div> 	

			   
              <div class="inputfield">
                <input type="submit" name="submit"  class="btn">
              </div>
            <div class="inputfield">    
                <input type="button" value="Cancel" class="btn" onclick="window.location.href = 'admin.php';">    
              </div>
<?php }} ?>			  
          </form>
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