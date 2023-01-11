<?php
  
require 'credentials.php';
if(empty($database_name) or $database_user==''){
	die('$database_user in credentials.php is not set');
}

//dont compare if your using xampp 
//mysql password is empty in xampp
// if(empty($database_password) or $database_password==''){
// 	die('$database_password in credentials.php is not set');
// }

//connect to server and select database
$database=mysqli_connect($database_host,$database_user,$database_password);

//check if credentials are correct or NOT
if(!$database)
{
	echo '<pre>host: '.htmlspecialchars($database_host).'</pre>';
	echo '<pre>user: '.htmlspecialchars($database_user).'</pre>';
	echo '<pre>password: '.htmlspecialchars($database_password).'</pre>';
	die('Unable to connect to database server!');
}

//check if database is available or NOT
if(!$database->select_db($database_name))
{
	echo "<pre>name: ".htmlspecialchars($database_name)."</pre>";
	die('Unable to select database: '.$database->error);
}

//lastly connection success
echo "<pre> Database connected successfully...</pre>";
?>