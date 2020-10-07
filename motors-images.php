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
                    <div class="navbar-brand" >
					     <h2>SIGIRI</h2>
                    </div>
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
                        <a href="home.php"><i class="fa fa-desktop"></i> <font color="#ff4d4d">Dashboard</font> </a>
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
							 <li class="active-link">
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
                     <h2>MORTORS </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
				  
				  
	            <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h5>Vehicles</h5>
						<center>
<!--****************************TABLE VEHICLES******************************** -->							

										
						<div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
							<select class  ="form-control" name="state" id="maxRows">
								 <option value="5000">Show ALL Rows</option>
								 <option value="5">5</option>
								 <option value="10">10</option>
								 <option value="15">15</option>
								 <option value="20">20</option>
								 <option value="50">50</option>
								 <option value="70">70</option>
								 <option value="100">100</option>
								</select>
							
						</div>		
					    <div style="overflow-x:auto;" >
                        <table class="table table-striped table-bordered table-hover" width="100%" id="table-id" >
                            <thead>
                                <tr>
									   <th>Vehicle Id</th>
									   <th>Image 1</th>
									   <th>Image 2</th>
									   <th>Image 3</th>
									   <th>Image 4</th>
									   <th>Image 5</th> 
									 
									 <th align="center"><font color="red">Option <br> Edit/Upload</font></th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
											<?php $sql = "SELECT * FROM vehicles  ORDER BY id DESC";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{
											?>
											
             <tr>    
                 <td> <center><?php echo htmlentities($result->id);?></center></td>
	             <td><img src="Uploads/vehicles/<?php echo htmlentities($result->Image1);?>" width="150" height="100"></td>
	             <td><img src="Uploads/vehicles/<?php echo htmlentities($result->Image2);?>" width="150" height="100"></td>
	             <td><img src="Uploads/vehicles/<?php echo htmlentities($result->Image3);?>" width="150" height="100"></td>
	             <td><img src="Uploads/vehicles/<?php echo htmlentities($result->Image4);?>" width="150" height="100"></td>
	             <td><img src="Uploads/vehicles/<?php echo htmlentities($result->Image5);?>" width="150" height="100"></td>

               <td align="center"> 
                  <a href="uploadimage1.php?imgid=<?php echo $result->id;?>">Image 1</a><br> 
                  <a href="uploadimage2.php?imgid=<?php echo $result->id;?>">Image 2</a><br>
                  <a href="uploadimage3.php?imgid=<?php echo $result->id;?>">Image 3</a><br>
                  <a href="uploadimage4.php?imgid=<?php echo $result->id;?>">Image 4</a><br>
                  <a href="uploadimage5.php?imgid=<?php echo $result->id;?>">Image 5</a><br>
                </td>
                
             </tr>

									
                                </tr>                               					
                            <?php }} ?></tbody>
                        </table>
					    </div>						
 					
						
						
						
					<!--		Start Pagination -->
								<div class='pagination-container' >
									<nav>
									  <ul class="pagination">
								
								<li data-page="prev" >
														 <span> < <span class="sr-only">(current)</span></span>
														</li>
									   <!--	Here the JS Function Will Add the Rows -->
							<li data-page="next" id="prev">
														   <span> > <span class="sr-only">(current)</span></span>
														</li>
									  </ul>
									</nav>
								</div>

				
					<!-- 		End of Container -->
					
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
	
	<script>
			getPagination('#table-id');

			function getPagination(table) {
			  var lastPage = 1;

			  $('#maxRows')
				.on('change', function(evt) {
				  //$('.paginationprev').html('');						// reset pagination

				 lastPage = 1;
				  $('.pagination')
					.find('li')
					.slice(1, -1)
					.remove();
				  var trnum = 0; // reset tr counter
				  var maxRows = parseInt($(this).val()); // get Max Rows from select option

				  if (maxRows == 5000) {
					$('.pagination').hide();
				  } else {
					$('.pagination').show();
				  }

				  var totalRows = $(table + ' tbody tr').length; // numbers of rows
				  $(table + ' tr:gt(0)').each(function() {
					// each TR in  table and not the header
					trnum++; // Start Counter
					if (trnum > maxRows) {
					  // if tr number gt maxRows

					  $(this).hide(); // fade it out
					}
					if (trnum <= maxRows) {
					  $(this).show();
					} // else fade in Important in case if it ..
				  }); //  was fade out to fade it in
				  if (totalRows > maxRows) {
					// if tr total rows gt max rows option
					var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
					//	numbers of pages
					for (var i = 1; i <= pagenum; ) {
					  // for each page append pagination li
					  $('.pagination #prev')
						.before(
						  '<li data-page="' +
							i +
							'">\
											  <span>' +
							i++ +
							'<span class="sr-only">(current)</span></span>\
											</li>'
						)
						.show();
					} // end for i
				  } // end if row count > max rows
				  $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
				  $('.pagination li').on('click', function(evt) {
					// on click each page
					evt.stopImmediatePropagation();
					evt.preventDefault();
					var pageNum = $(this).attr('data-page'); // get it's number

					var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

					if (pageNum == 'prev') {
					  if (lastPage == 1) {
						return;
					  }
					  pageNum = --lastPage;
					}
					if (pageNum == 'next') {
					  if (lastPage == $('.pagination li').length - 2) {
						return;
					  }
					  pageNum = ++lastPage;
					}

					lastPage = pageNum;
					var trIndex = 0; // reset tr counter
					$('.pagination li').removeClass('active'); // remove active class from all li
					$('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
					// $(this).addClass('active');					// add active class to the clicked
					limitPagging();
					$(table + ' tr:gt(0)').each(function() {
					  // each tr in table not the header
					  trIndex++; // tr index counter
					  // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
					  if (
						trIndex > maxRows * pageNum ||
						trIndex <= maxRows * pageNum - maxRows
					  ) {
						$(this).hide();
					  } else {
						$(this).show();
					  } //else fade in
					}); // end of for each tr in table
				  }); // end of on click pagination list
				  limitPagging();
				})
				.val(5)
				.change();

			  // end of on select change

			  // END OF PAGINATION
			}

			function limitPagging(){
				// alert($('.pagination li').length)

				if($('.pagination li').length > 7 ){
						if( $('.pagination li.active').attr('data-page') <= 3 ){
						$('.pagination li:gt(5)').hide();
						$('.pagination li:lt(5)').show();
						$('.pagination [data-page="next"]').show();
					}if ($('.pagination li.active').attr('data-page') > 3){
						$('.pagination li:gt(0)').hide();
						$('.pagination [data-page="next"]').show();
						for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
							$('.pagination [data-page="'+i+'"]').show();

						}

					}
				}
			}

			$(function() {
			  // Just to append id number for each row
			  $('table tr:eq(0)').prepend('<th> ID </th>');

			  var id = 0;

			  $('table tr:gt(0)').each(function() {
				id++;
				$(this).prepend('<td>' + id + '</td>');
			  });
			});		
	</script>
	    
 
 
	
</body>
</html>
 <?php } ?>