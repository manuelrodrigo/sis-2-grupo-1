<?php

$host="localhost"; // Host 
$username="root"; 
$password=""; // Mysql password 
$db_name="sis2"; // nombre base de datos 
$tbl_name="members"; // nombre tabla

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// protección contra mySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);


$count=mysql_num_rows($result);


if($count==1){
session_start();
// Rregistrar $myusername, $mypassword y redireccionar a "login_success.php"
$_SESSION["Username"]=($myusername);
$_SESSION["Password"]=($mypassword); 
header("location:login_success.php");
}
else {
echo "Nombre de usuario o password incorrecto";
}
?>