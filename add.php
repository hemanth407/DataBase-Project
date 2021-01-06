<?php
$name=$_POST['name'];
$user=$_POST['bal'];
$gen=$_POST['price'];


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
	

	$qu2="INSERT INTO  inventory VALUES('','$name','$user','$gen')";
	$con2=mysql_query($qu2);

	if($con2)
echo '<script>alert("Added successfully");
      
      window.location.href="additem.html";  //$redirect
      </script>';
//$qu3="INSERT INTO  log VALUES('$name','$user')";
	//$con2=mysql_query($qu3);
	else
echo'<script>alert("Error in adding");
      
      window.location.href="additem.html";  //$redirect
      </script>';

	mysql_close();
?>

