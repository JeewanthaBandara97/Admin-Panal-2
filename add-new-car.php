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
      
$vehiclemodel=$_POST['vehiclemodel'];
$price=$_POST['price'];
$edition=$_POST['edition'];
$modelyear=$_POST['modelyear'];
$tansmission=$_POST['tansmission'];
$bodytype=$_POST['bodytype'];
$fueltype=$_POST['fueltype'];
$enginecapacity=$_POST['enginecapacity'];
$mileage=$_POST['mileage'];
$vowner=$_POST['vowner'];
$vehiclebrand=$_POST['vehiclebrand'];
$Other=$_POST['Other'];

  $sql = "INSERT INTO vehicles(VehicleModel,Price,Edition,ModelYear,Tansmission,BodyType,FuelType,EngineCapacity,Mileage,VOwner,VehicleBrand,Other,Image1,Image2,Image3,Image4,Image5) 
          VALUES(:vehiclemodel,:price,:edition,:modelyear,:tansmission,:bodytype,:fueltype,:enginecapacity,:mileage,:vowner,:vehiclebrand,:Other,'defult.png','defult.png','defult.png','defult.png','defult.png')";

$query = $dbh->prepare($sql);

$query->bindParam(':vehiclemodel',$vehiclemodel,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':edition',$edition,PDO::PARAM_STR);
$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
$query->bindParam(':tansmission',$tansmission,PDO::PARAM_STR);
$query->bindParam(':bodytype',$bodytype,PDO::PARAM_STR);
$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
$query->bindParam(':enginecapacity',$enginecapacity,PDO::PARAM_STR);
$query->bindParam(':mileage',$mileage,PDO::PARAM_STR);
$query->bindParam(':vowner',$vowner,PDO::PARAM_STR);
$query->bindParam(':vehiclebrand',$vehiclebrand,PDO::PARAM_STR);
$query->bindParam(':Other',$Other,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
header('Location: motors.php?car_added');
}
else 
{
header('Location: motors.php?car_notadded');

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
				
                    <li>
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
							 <li class="active-link">
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
                     <h2>Add New Vehicle </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
				  
  <div class="wrapper">
  <div class="title">
    
  </div>
  <div class="form">
          <form name="insert-form" id="contact-form" action="add-new-car.php" method="POST">        
            
               <div class="inputfield">
                  <label>Vehicle Model</label>
                  <input type="text" name="vehiclemodel" class="input" required>
               </div>  
               
               <div class="inputfield">
                  <label>Price</label>
                  <input type="text" name="price" class="input" >
               </div>  
              <div class="inputfield">
                  <label>Edition</label>
                  <input type="text" name="edition" class="input" >
               </div> 
               <div class="inputfield">
                  <label>Model Year</label>
                  <input type="text" name="modelyear" class="input" >
               </div> 
               
        <div class="inputfield">
          <label>Transmission</label>
          <div class="custom_select">
            <select id="select1" name="tansmission">
              <option selected disabled>Select</option>
              <option value="Manual">Manual</option>
              <option value="Auto">Auto</option>
            </select>
          </div>
       </div>               
               <div class="inputfield">
                  <label>Body Type</label>
                  <input type="text" name="bodytype" class="input" >
               </div>     
               
        <div class="inputfield">
          <label>Fuel Type</label>
          <div class="custom_select">
            <select id="select3" name="fueltype">
              <option selected disabled>Select</option>
              <option value="Diesel">Diesel </option>
              <option value="Petrol">Petrol </option>
              <option value="Hybrid/Petrol">Hybrid/Petrol </option>			  
            </select>
          </div>
       </div> 
       
             <div class="inputfield">
                  <label>Engine Capacity</label>
                  <input type="text" name="enginecapacity" class="input" >
               </div> 
                <div class="inputfield">
                  <label>Mileage</label>
                  <input type="text" name="mileage" class="input" >
               </div>
               
                 <div class="inputfield">
                  <label>Condition</label>
                  <input type="text" name="vowner" class="input" >
               </div>               
 
               
	   <div class="inputfield">
          <label>Vehicle Brand </label>
          <div class="custom_select">
            <select id="select2" name="vehiclebrand">
              <option selected disabled>Select</option>
			  
				<?php $sql = "SELECT * FROM brands";
					  $query = $dbh -> prepare($sql);
					  $query->execute();
					  $results=$query->fetchAll(PDO::FETCH_OBJ);
					  $cnt=1;
					  if($query->rowCount() > 0)
					  {
					  foreach($results as $result)
					  {
						?> 							
			
                     <option value="<?php echo htmlentities($result->Name);?>"><?php echo htmlentities($result->Name);?></option>
		
				<?php }} ?>

 			  
            </select>
          </div>
       </div> 
       
               
                <div class="inputfield">
                  <label>Other</label>
                  <input type="text" name="Other" class="input" >
               </div>                                                                    
            
               
              <div class="inputfield">
                <input type="submit" name="submit"  class="btn">
              </div>
            <div class="inputfield">    
                <input type="button" value="Cancel" class="btn" onclick="window.location.href = 'motors.php';">    
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