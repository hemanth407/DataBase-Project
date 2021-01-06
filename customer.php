<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>  

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from idealbrothers.thesoftking.com/html/bigenza/bigenja/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Nov 2018 03:30:28 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online shopping</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- icofont -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- select 2  -->
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body> 
  <!-- support bar area start -->
<div class="support-bar-area bg-orange">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="right-content-area"><!-- right content area -->
                        <ul>
                            <li>
                                Ordered before 17:30, shipped today
                            </li>
                            <li>
                                <i class="fas fa-truck"></i>  Free Shipping
                            </li>
                            <li>
                                <i class="fas fa-clock"></i> 24/7 Online Support
                            </li>
                        </ul>
                    </div><!-- //. right content area -->
                </div>
            </div>
        </div>
</div>
<!-- support bar area end -->  


<!-- support bar area two end -->

<!-- navbar area start -->
<nav class="navbar navbar-area navbar-expand-lg navbar-light bg-orange">
        <div class="container nav-container">
            <div class="logo-wrapper navbar-brand ">
                <a href="index.html" class="logo main-logo mobile-logo">
                    <img src="assets/img/logo-white.png" alt="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="mirex">
                <!-- navbar collapse start -->
                <ul class="navbar-nav">
                    <!-- navbar- nav -->
                    
					<li class="nav-item">
                        <a class="nav-link" href="home.html">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html"><?=$_SESSION['sess_user'];?>! </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
             <!-- /.navbar btn wrapper -->
                       
           
        </div>
    </nav>
    <!-- navbar area end -->

<!-- header area start -->
<!-- slide sidebar area end -->
<!-- cart sidebar area start -->

 <center>    <form action="" method="POST">
                            <input type="text" name="name" placeholder="Item Name" required>
						 <div class="form-button">
                                <button id="submit" type="submit">ADD TO CART</button>
                            </div>
							</form></center>

        <div class="row">
            <div class="col-lg-12 remove-col-padding">
                <div class="best-seller-two" >
                        <div class="tab-content" >
                            <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 "><!-- single product item two -->
                                        <div class="single-product-item-two">
                                            <div class="img-wrapper">
                                                <img src="assets/img/product-small/001.jpg" alt="product image">
                                                
                                            </div>
                                            <div class="content">
                                                <a href="#" class="category">JBL headphone</a>
                                                <h4 class="title">JBL headphone</h4>
                                                <div class="price"><span class="sprice">RS/- 965.00</span> <del class="dprice">RS/- 1000.00</del></div>
											
                                            </div>
                                        </div>
                                    </div><!-- //.single product item two -->
                                    <div class="col-lg-3 col-md-6"><!-- single product item two -->
                                        <div class="single-product-item-two">
                                            <div class="img-wrapper">
                                                <img src="assets/img/product-small/002.jpg" alt="product image">
                                                
                                            </div>
                                            <div class="content">
                                                <a href="#" class="category">Earphone</a>
                                                <h4 class="title">earphone</h4>
                                                <div class="price"><span class="sprice">RS/- 465.00</span> <del class="dprice">RS/- 585.00</del></div>
                                            </div>
                                        </div>
                                    </div><!-- //.single product item two -->
                                    <div class="col-lg-3 col-md-6 "><!-- single product item two -->
                                        <div class="single-product-item-two">
                                            <div class="img-wrapper">
                                                <img src="assets/img/product-small/003.jpg" alt="product image">
                                                
                                            </div>
                                            <div class="content">
                                                <a href="#" class="category">accesories</a>
                                                <h4 class="title">xolo</h4>
                                                <div class="price"><span class="sprice">RS/- 723.00</span> <del class="dprice">RS/- 945.00</del></div>
                                            </div>
                                        </div>
                                    </div><!-- //.single product item two -->
                                    <div class="col-lg-3 col-md-6"><!-- single product item two -->
                                        <div class="single-product-item-two">
                                            <div class="img-wrapper">
                                                <img src="assets/img/product-small/004.jpg" alt="product image">
                                                
                                            </div>
                                            <div class="content">
                                                <a href="#" class="category">sony</a>
                                                <h4 class="title">speaker</h4>
                                                <div class="price"><span class="sprice">RS/- 2600.00</span> <del class="dprice">RS/- 2800.00</del></div>
                                            </div>
                                        </div>
                                    </div><!-- //.single product item two -->
                                    <div class="col-lg-3 col-md-6"><!-- single product item two -->
                                        <div class="single-product-item-two">
                                            <div class="img-wrapper">
                                                <img src="assets/img/product-small/005.jpg" alt="product image">
                                                
                                            </div>
                                            <div class="content">
                                                <a href="#" class="category">JoyStick</a>
                                                <h4 class="title">tech</h4>
                                                <div class="price"><span class="sprice">RS/- 589.00</span> <del class="dprice">RS/- 755.00</del></div>
                                            </div>
                                        </div>
                                        
                                    </div><!-- //.single product item two -->
                                    <div class="col-lg-3 col-md-6 "><!-- single product item two -->
                                        <div class="single-product-item-two">
                                            <div class="img-wrapper">
                                                <img src="assets/img/product-small/006.jpg" alt="product image">
                                                
                                            </div>
                                            <div class="content">
                                                <a href="#" class="category">IPhone</a>
                                                <h4 class="title">iphone</h4>
                                                <div class="price"><span class="sprice">RS/- 80000.00</span> <del class="dprice">RS/- 85000.00</del></div>
                                            </div>
                                        </div>
                                    </div><!-- //.single product item two -->
                                    <div class="col-lg-3 col-md-6"><!-- single product item two -->
                                        <div class="single-product-item-two">
                                            <div class="img-wrapper">
                                                <img src="assets/img/product-small/007.jpg" alt="product image">
                                                
                                            </div>
                                            <div class="content">
                                                <a href="#" class="category">IPad</a>
                                                <h4 class="title">ipad</h4>
                                                <div class="price"><span class="sprice">RS/- 19800.00</span> <del class="dprice">RS/- 22000.00</del></div>
                                            </div>
                                        </div>
                                    </div><!-- //.single product item two -->
                                    <div class="col-lg-3 col-md-6"><!-- single product item two -->
                                        <div class="single-product-item-two">
                                            <div class="img-wrapper">
                                                <img src="assets/img/product-small/001.jpg" alt="product image">
                                                
                                            </div>
                                            <div class="content">
                                                <a href="#" class="category">SKULL CANDY </a>
                                                <h4 class="title">earphone</h4>
                                                <div class="price"><span class="sprice">RS/- 1247.00</span> <del class="dprice">RS/- 1485.00</del></div>
                                            </div>
                                        </div>
                                    </div><!-- //.single product item two -->
                                </div>
                            </div>
                            
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<!-- best seller area two end -->

<!-- speakers area start -->
<!-- speakers area end -->

<!-- best seller area four start -->

<!-- best seller area two end -->
<!-- 
    <!-- preloader area end -->

    <!-- jquery -->
	
	
	
	<?php
$name=$_POST['name'];

	$con=mysql_connect("localhost","root","");
	

	
	mysql_select_db("register",$con);
	
      $query=mysql_query("SELECT * FROM inventory WHERE item_name='".$name."'");// AND password='".$pass."'");  
	  $row = mysql_fetch_array($query);
$id=$row["item_id"];
$iname=$row["item_name"];
$pr=$row["price"];
//include('cus.php');
 $c_id=$_SESSION['sess_user'];
  $query1=mysql_query("SELECT * FROM reg WHERE email='".$c_id."'");
  
  $row1 = mysql_fetch_array($query1);
$cid=$row1["id"];
 
	$qu2="INSERT INTO  cart VALUES('','$id','$iname','$pr','$cid')";
	$con2=mysql_query($qu2);

	/*if($con2)
echo '<script>alert("Thank you for Register");
      
      //window.location.href="customer.php";  //$redirect
      </script>';

  else
echo'<script>alert("Error in Register");
      
      window.location.href="customer.php";  //$redirect
      </script>';
*/
	mysql_close();
?>

	
	
	
	
	
	
	
	
	
	
    <script src="assets/js/jquery.js"></script>
    <!-- popper -->
    <script src="assets/js/popper.min.js"></script>    
	<!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- way poin js-->
    <script src="assets/js/waypoints.min.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <!-- wow js-->
    <script src="assets/js/wow.min.js"></script>
    <!-- counterup js-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- select 2 -->
    <script src="assets/js/select2.min.js"></script>
    <!-- main -->
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from idealbrothers.thesoftking.com/html/bigenza/bigenja/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Nov 2018 03:32:40 GMT -->
</html>
<?php  
}  
?>  