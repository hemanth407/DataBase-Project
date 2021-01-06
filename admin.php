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
<style>
table{width:100%;position:center;height:50px;font-size:20p;}
tr{height:400px}

</style>




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
    </div>
</div>
<br><br><br>
<div style="text-align:center;">
<table border="5" id="footer">
<tr>
<td><a class="nav-link" href="inv.php"><h1>INVENTORY <br>DETAILS</h1></a></td>
<td><a class="nav-link" href="lo.php"><h1>LOGIN <br>DETAILS</h1></a></td>
<td><a class="nav-link" href="cus1.php"><h1>VIEW <br>CUSTOMER <br>DETAILS</h1></a></td>
</tr>
</table>
</div>







<!-- best seller area two end -->

<!-- speakers area start -->
<!-- speakers area end -->

<!-- best seller area four start -->

<!-- best seller area two end -->
<!-- 
    <!-- preloader area end -->

    <!-- jquery -->
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