<?php
error_reporting(E_ALL);
include "sql_data.php";

http_response_code(500);
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phone"]))
{
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];

	if ($name != NULL && $email != NULL && $password != NULL && $phone != NULL)
	{

		$link = mysqli_connect($sql_host, $sql_user, $sql_pass, $sql_db);
		if(!$link) die("Error while trying to connect to the database");

		$query = mysqli_query($link, "INSERT INTO `gtbcn_users`(`name`, `email`, `password`, `phone`) 
		VALUES (\"" . mysqli_real_escape_string($link, $name) . "\", \"" . mysqli_real_escape_string($link, $email) . "\",
		\"" . mysqli_real_escape_string($link, $password) . "\",  \"" . mysqli_real_escape_string($link, $phone) . "\")");

		if(!$query) die("Error while communicating with the database");
		else http_response_code(200);

		mysqli_close($link);
		
	}
}
?>
