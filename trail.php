/*

//mysql_close();
//$con=mysql_connect("localhost","root","");
if(mysql_query("CREATE DATABASE login",$con))
echo"database created";
else
echo"database not created".mysql_error();



	mysql_select_db("login",$con);
	
	$query2="CREATE TABLE log(usernamed varchar(20),passcode varchar(20))";
$con2=mysql_query($query2);
if($con2)
echo"table created";
else
echo"table not created";


	mysql_query("INSERT INTO  log VALUES('$name','$user')");
	
	/*
$query3="SELECT * FROM reg";
	$con3=mysql_query($query3);
while($row=mysql_fetch_array($con3))
{
echo "$row[username]";
echo "$row[passcode]";
}*/


//$row=mysql_fetch_array($con3) or die(mysql_error());
//echo "error";
