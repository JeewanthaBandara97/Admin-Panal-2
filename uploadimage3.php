<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['update']))
{
	
$id=intval($_GET['imgid']);

$vimage1= time() . '-' . $_FILES["img1"]["name"];
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["img1"]["tmp_name"],"Uploads/vehicles/" .time() . '-'.$_FILES["img1"]["name"]);

$sql="update vehicles set Image3=:vimage1 where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Image updated successfully";



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
				
                    <li>
                        <a href="home.php"><i class="fa fa-desktop "></i><font color="#ff4d4d">Dashboard</font>  </a>
                    </li>				
                    <li>
                        <a href="admin.php"><i class="fa fa-table "></i><font color="#ff4d4d">Admin</font></a>
                    </li>
					
                    <li>
                        <a><i class="fa fa-table "></i><font color="#ff4d4d">Sigiri Mortors</font></a>
                    </li>					
							<li>
								<a href="vehicle-brands.php"><i class="fa fa-arrow-right"></i>Vehicle Brands</a>
							</li>						
							<li>
								<a href="motors.php" ><i class="fa fa-arrow-right"></i>Insert Vehicle</a>
							</li>
							 <li class="active-link">
								<a href="motors-images.php" ><i class="fa fa-arrow-right"></i>Upload Vehicle Images</a>
							</li>

							
                    <li>
                        <a href="#" ><i class="fa fa-table "></i><font color="#ff4d4d">Sigiri Design</font></a>
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
                     <h2>Add New User </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
				  
  <div class="wrapper">
  <div class="title">
    
  </div>
  <div class="form">
				  <form name="insert-form" id="contact-form"  method="POST" enctype="multipart/form-data"> 

								<?php 
								$id=intval($_GET['imgid']);
								$sql ="SELECT Image3 from vehicles where vehicle.id=:id";
								$query = $dbh -> prepare($sql);
								$query-> bindParam(':id', $id, PDO::PARAM_STR);
								$query->execute();
								$results=$query->fetchAll(PDO::FETCH_OBJ);
								$cnt=1;
								if($query->rowCount() > 0)
								{
								foreach($results as $result)
								{	?>

								<?php }}?>

								<?php 
									 
								?>

								<?php 
									 
								?>	
								
					 
                        <center>					 
	                      <img src="Uploads/vehicles/<?php echo htmlentities($result->Image3);?>" width="300" height="200" style="border:solid 1px #000" class="input">
						 
                        </center>							  
                        <br><br>  
					   <div class="inputfield">
						  <label>Image</label>
						  <input type="file" name="img1" class="input" >
					   </div>  
   
					  <div class="inputfield">
						<input type="submit" name="update" value="Upload" class="btn">
					  </div>
					<div class="inputfield">    
						<input type="button" value="Back" class="btn" onclick="window.location.href = 'motors-images.php';">    
					  </div>
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