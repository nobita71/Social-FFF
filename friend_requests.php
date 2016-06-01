<?php
include("inc/header.inc.php");
?>
<?php
//fff request
$friendRequests = mysqli_query($con,"SELECT * FROM friend_requests WHERE user_to='$user_name'");
$numrows = mysqli_num_rows($friendRequests);
if($numrows == 0){
	echo "You have no Friend Request!";
}
else
{
	while($get_row = mysqli_fetch_assoc($friendRequests)){
		$id = $get_row['id'];
		$user_to = $get_row['user_to'];
		$user_from = $get_row['user_from'];

		echo '' . $user_from . 'went to be your friend!';
	}
}
?>
<form action="friend_requests.php" method="POST">
<input type="submit" name="acceptrequest<?php echo $user_from; ?>" value="Accept Request">
</form>