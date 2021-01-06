<?php
$name=$_POST['username'];
$user=$_POST['password'];
$gen=$_POST['phone'];
$email=$_POST['email'];

	$con=mysql_connect("localhost","root","");
	
	
	/*if(mysql_query("CREATE DATABASE register",$con))
echo"database created";
else
echo"database not created".mysql_error();
*/

	
	mysql_select_db("register",$con);
	
	/*$query1="CREATE TABLE reg(username varchar(20),passcode varchar(20),gender char(1),email varchar(20))";
   	$con1=mysql_query($query1);
	
	
if($con1)
echo"table created";
else
echo"table not created";
*/
	

	$qu2="INSERT INTO  reg VALUES('','$name','$user','$gen','$email')";
	$con2=mysql_query($qu2);

	if($con2)
echo '<script>alert("Thank you for Register");
      
      window.location.href="cus.php";  //$redirect
      </script>';
//$qu3="INSERT INTO  log VALUES('$name','$user')";
	//$con2=mysql_query($qu3);
	else
echo'<script>alert("Error in Register");
      
      window.location.href="register2.html";  //$redirect
      </script>';

	mysql_close();
?>
