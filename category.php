<?php
session_start();
if($_SESSION['login']==true) {?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
  <?php include "header.php"; ?> 
   
     <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="home.php">
                          <i class="icon_house_alt"></i>
                          <span>HOME</span>
                      </a>
                  </li>
				  
				    <li>
                      <a class="" href="user.php">
                          <i class="icon_genius"></i>
                          <span>  USERS </span>
                      </a>
                  </li>
				  
				  	    <li>
                      <a class="" href="category.php">
                          <i class="icon_genius"></i>
                          <span>CATEGORIES</span>
                      </a>
                  </li>
				  
				   <li>
                      <a class="" href="topics.php">
                          <i class="icon_genius"></i>
                          <span>ALL TOPICS</span>
                      </a>
                  </li>
				   <li>
                      <a class="" href="news.php">
                          <i class="icon_genius"></i>
                          <span>NEWS</span>
                      </a>
                  </li>
				  
				  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
   
      <!--main content start-->
	  <?php 
	include "connection.php";
	
$r="select * from tbl_categories";
$rs=mysqli_query($conn ,$r);
?>
	
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">

			<h3 class="page-header"><i class="fa fa-table"></i>ALL CATEGORIES </h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
						<li><i class="fa fa-table"></i> All categories</li>						
					</ol>
				</div>
			</div>
              <!-- page start-->      
	   <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">      
<?php 
if(!empty($_GET['msg']))
{
	if($_GET['msg']=='deleted'){
		echo "<center>"."category deleted successfully"."</center>";
	}
	if($_GET['msg']=='inserted'){
		echo "<center>"."category inserted successfully"."</center>";
	}
	if($_GET['msg']=='updated'){
		echo "<center>"."category updated successfully"."</center>";
	
	if($_GET['msg']=='error'){
		echo "<center>"."categoryid does not exist"."</center>";
	}
	
	if($_GET['msg']=='unauthorised'){
		echo "<center>"."no authorisation"."</center>";
			}
		}
		}
		?>
		<br>
					  
<center><a href="addcategory.php"> <button type="submit" class="btn btn-primary"><i class="fa fa-plus">ADD NEW CATEGORY </i></button></a></center> <br>	
						  
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                <th> CATEGORY ID</th>
								<th> CATEGORY NAME </th>
								<th> DELETE</th>
								<th>UPDATE </th>
							</tr>
 <?php 
while($row=mysqli_fetch_assoc($rs))
		{
		?>
		<tr> 			
		                 <td> <?php echo $row['cat_id']; ?> </td>
						 <td> <?php echo $row['cat_name']; ?>  </td>
						 <td> <a href="deletecategory.php?id= <?php echo $row['cat_id'];?>" >   <button class="btn btn-danger"> <i class="fa fa-trash-o"> </i> DELETE </a> </button></td>
						 <td> <a href="updatecategory.php?id= <?php echo $row['cat_id'];?>" > <button class="btn btn-success"> <i class="fa fa-pencil"> </i> UPDATE </button></a> </td>								
		 </tr>
		 <?php 
		}
 ?>	                                                              
                          </tbody>
                        </table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
  </body>
</html>
<?php 
}
else {
	header("location:index.php?msg=login");
}
?>