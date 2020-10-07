<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 



if(isset($_GET['del']))
{
$id=$_GET['del'];

  $select_stmt= $dbh->prepare('SELECT * FROM vehicles WHERE id =:id'); //sql select query
  $select_stmt->bindParam(':id',$id);
  $select_stmt->execute();
  $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
  unlink("Uploads/vehicles/".$row['Image1']); //unlink function permanently remove your file
  unlink("Uploads/vehicles/".$row['Image2']); //unlink function permanently remove your file
  unlink("Uploads/vehicles/".$row['Image3']); //unlink function permanently remove your file
  unlink("Uploads/vehicles/".$row['Image4']); //unlink function permanently remove your file
  unlink("Uploads/vehicles/".$row['Image5']); //unlink function permanently remove your file

  //delete an orignal record from db
  $delete_stmt = $dbh->prepare('DELETE FROM vehicles WHERE id =:id');
  $delete_stmt->bindParam(':id',$id);
  $delete_stmt->execute();  
  
  header('Location: motors.php?vehicle_delete');
  
}  


?>
<?php } ?>