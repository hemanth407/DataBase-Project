<?php
$name=$_POST['name'];

	$con=mysql_connect("localhost","root","");
	

	
	mysql_select_db("register",$con);
	
      $query=mysql_query("SELECT * FROM inventory WHERE item_name='".$name."'");// AND password='".$pass."'");  
	  $row = mysql_fetch_array($query);
$id=$row["item_id"];
$iname=$row["item_name"];
$pr=$row["price"];
include('cus.php');
 $c_id=$_SESSION['sess_user'];
  $query1=mysql_query("SELECT * FROM reg WHERE email='".$c_id."'");
  
  $row1 = mysql_fetch_array($query1);
$cid=$row1["id"];
 
	$qu2="INSERT INTO  cart VALUES('','$id','$iname','$pr','$cid')";
	$con2=mysql_query($qu2);

	if($con2)
echo '<script>alert("Thank you for Register");
      
      window.location.href="customer.php";  //$redirect
      </script>';

  else
echo'<script>alert("Error in Register");
      
      window.location.href="customer.php";  //$redirect
      </script>';

	mysql_close();
?>
