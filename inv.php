<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from idealbrothers.thesoftking.com/html/bigenza/bigenja/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Nov 2018 03:30:28 GMT -->
<head>
<style>
table{width:100%;position:center;height:50px;font-size:20p;}


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

<!-- header area start -->
<!-- slide sidebar area end -->
<!-- cart sidebar area start -->
    </div>
</div>

<br><br><br>
<center><h2>INVENTORY DETAILS</h2></center>
<center><h3><a href="additem.html">Add Item</a></h3></center>
<div style="text-align:center;">
<table border="3" id="footer">
<tr>
<th>Item id</th>
<th>Item Name</th>
<th>Balance</th>
<th>Price</th>

</tr>
<br>

<?php
 // include_once('db.php');
 $con=mysql_connect("localhost","root","");
 mysql_select_db("register",$con);
 
 $res = mysql_query("SELECT * FROM inventory");
 
  while( $row = mysql_fetch_array($res) )
	 // echo "$row[id]. $row[name] <br />";

echo '
<tr>
<td>'.$row["item_id"].'</td>
<td>'.$row["item_name"].'</td>
<td>'.$row["balance"].'</td>
<td>'.$row["price"].'</td>
</tr>
'
?>
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
<center><h3> <a href="admin.php">BACK</a></center>


<!-- Mirrored from idealbrothers.thesoftking.com/html/bigenza/bigenja/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Nov 2018 03:32:40 GMT -->
</html>
<?php  
?>  