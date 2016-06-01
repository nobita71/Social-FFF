<?php
include ("./inc/connect.inc.php");

session_start();
if (isset($_SESSION['user_login'])){
	$username = $_SESSION["user_login"];
}
else
{
	$username = "";
}

$post = $_POST['post'];
if ($post != "") {
	$date_added = date("Y-m-d");
	$added_by = $username;
	$user_posted_to = $user_name;

	$sqliCommand = ($con,"INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')");
	$query = mysqli_query($con,$sqliCommand) or die (mysqli_error());

}
else
{
	echo "You Must Need To Enter Something in the post field before you can send if ...";
}

?>