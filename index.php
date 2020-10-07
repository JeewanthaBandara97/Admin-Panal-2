<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
} else{

  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>  SIGIRI   </title>
    <link rel='icon' href='assets/favicon.ico' rel="icon" type='image/x-icon'/ >
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 




    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/form.css"> 


  </head>

  <body>

 



<br><br><br><br>
<div class="wrapper">
  <div class="title">
     <font size="6" color="#ff1a1a">ADMIN LOGIN</font>
  </div> 
  <div class="form">
      
      
<form name="insert-form" id="contact-form"  method="POST">     
	<br>
	<div class="inputfield">
	  <label>User Name</label>
	  <input type="text" name="username" class="input" placeholder="" required>
	</div>    
	<div class="inputfield">
	  <label>Password</label>
	  <input type="password" name="password" class="input" placeholder="" required>
	</div>  
	<div class="inputfield">
	<input type="submit" name="login" value="Login" class="btn">
	</div>
	<div class="inputfield">    
	<input type="button" value="Cancel" class="btn" onclick="window.location.href = '../contact.php';">   
	</div>
</form>

      </div>
</div>
								
 
 


 


  </body>

</html>

								