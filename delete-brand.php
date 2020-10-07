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

  $select_stmt= $dbh->prepare('SELECT * FROM brands WHERE id =:id'); //sql select query
  $select_stmt->bindParam(':id',$id);
  $select_stmt->execute();
  $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
  unlink("Uploads/brands/".$row['Image']); //unlink function permanently remove your file
  
  //delete an orignal record from db
  $delete_stmt = $dbh->prepare('DELETE FROM brands WHERE id =:id');
  $delete_stmt->bindParam(':id',$id);
  $delete_stmt->execute();  
  
  header('Location: vehicle-brands.php?msg=delete');  
}
else 
{
header('Location: vehicle-brands.php?msg=error');
}

?>
<?php } ?>