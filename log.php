<?php
$name=$_POST['username'];
$user=$_POST['password'];

	$con=mysql_connect("localhost","root","");
	
	
	if(mysql_query("CREATE DATABASE register",$con))
echo"database created";
else
echo"database not created".mysql_error();


	mysql_select_db("register",$con);

	$query1="CREATE TABLE reg(usernamed varchar(20),passcode varchar(20))";
	$con1=mysql_query($query1);
if($con1)
echo"table created";
else
echo"table not created";

	

	$qu2="INSERT INTO  reg VALUES('$name','$user')";
	$con2=mysql_query($qu2);

	if($con2)
echo"u are registered";
else
echo"u  are not registreed something has gone wrong pleae check it";
	
	
$query3="SELECT * FROM reg";
	$con3=mysql_query($query3);
while($row=mysql_fetch_array($con3))
{
echo "$row[usernamed]";
echo "$row[passcode]";
}
//$row=mysql_fetch_array($con3) or die(mysql_error());
//echo "error";

	
	mysql_close();
?>