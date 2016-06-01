<html>
<?php include ("./inc/header.inc.php"); ?>
<?php
if(isset($_GET['u'])){
	$username = mysqli_real_escape_string($con,$_GET['u']);
	if(ctype_alnum($username)){
		$check = mysqli_query("SELECT username,first_name from users where username = '$user_name'");

		if(mysqli_num_rows($check) == 1){
			$get = mysqli_fetch_assoc($check);
			$username = $get['username'];
			$firstname = $get['first_name'];
		}
		else{
			echo "<meta http-equiv=\"refresh\"content=\"0; url=http://localhost/social/index.php\">";
			exit();
		}
	}
}
$post = @$_POST['post'];
if ($post != "") {
	$date_added = date("Y-m-d");
	$added_by = $user_name;
	$user_posted_to = $user_name;

	$sqliCommand = "INSERT INTO posts VALUES('','$post','$date_added','$added_by','$user_posted_to')";
	$query = mysqli_query($con,$sqliCommand) or die (mysqli_error());

}
//check user has uploaded a profile photo
$check_pic = mysqli_query($con,"SELECT profile_pic FROM users WHERE username='$username'");
$get_pic_row = mysqli_fetch_assoc($check_pic);
$profile_pic_db = $get_pic_row['profile_pic'];
if ($profile_pic_db == "") {
	$profile_pic = "img/default_pic.jpg";
}
else
{
	$profile_pic = "userdata/profile_pic/".$profile_pic_db;
}
?>
<?php 
$errorMeg = "";
	if (isset($_POST['addfriend'])){
		$friend_request = $_POST['addfriend'];
		$user_to = $user_name;
		$user_from = $username;

		if($user_to == $username) {
			$errorMeg = "You can't send friend request to yourelf!<br/>";
		}
		else
		{
			$create_request = mysqli_query ($con,"INSERT INTO friend_requests VALUES ('','$user_to','$user_from')");
			$errorMeg = "Your friend request has been already send!<br/>";
		}
	}
	else
	{
		//do nothing
	}
?>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="js/main.js" type="text/javascript"></script>
</head>
<body>
<div class="container">
	<div class="col-md-3">
		<div class="profilepic">
			<img src="image/<?php echo $profile_pic; ?>" height="247" width="250" alt="<?php echo $user_name; ?>'s Profile"/>
		</div>
			<form action="<?php $user_name; ?>" method="POST">
			<?php echo $errorMeg; ?>
			<input class="btn btn-primary" type="submit" name="addfriend" value="Add as friend"/>
			<input class="btn btn-primary" type="submit" name="sendmeg" value="Send Message"/>
			</form>
			 <div class="protitle">
				<div class="texthere" style="margin-bottom: 3px; margin-top: 5px;"><?php echo $user_name; ?>'s Profile </div>
			 </div>
		
				<div class="procontent" style="opacity: 0.9; filter: alpha(opacity=90);">
					<div class="prolectsidecontent">
						<?php

						$about_query = mysqli_query($con,"SELECT bio FROM users WHERE username='$user_name'");
						$get_result = mysqli_fetch_assoc($about_query);
						$about_the_user = $get_result['bio'];

						echo $about_the_user;

						?>

					</div>
				</div>

	<div class="texthead" style="opacity: 0.9; filter: alpha(opacity=90);"><?php echo $user_name; ?>'s friends
		<div class="proleftsidecontent">
			<img src="#" height="50" width="40" />&nbsp;&nbsp;
			<img src="#" height="50" width="40" />&nbsp;&nbsp;
			<img src="#" height="50" width="40" />&nbsp;&nbsp;
			<img src="#" height="50" width="40" />&nbsp;&nbsp;
			<img src="#" height="50" width="40" />&nbsp;&nbsp;
			<img src="#" height="50" width="40" />&nbsp;&nbsp;
			<img src="#" height="50" width="40" />&nbsp;&nbsp;
			<img src="#" height="50" width="40" />&nbsp;&nbsp;
		</div>
	</div>

	</div>

	<div class="col-md-9">
		<div class="poststs" style="opacity: 0.9; filter: alpha(opacity=90); height: 110px;">
					<form action="<?php echo $user_name; ?>" method="POST">
						<textarea id="post" name="post" rows="5" cols="100" style="margin-left: 5px; margin-top: 5px;"></textarea>
						<input type="submit" name="send" value="post" style="background-color: #CDC1C5; float: right; border:1px solid black; margin-top:13px; margin-bottom: 13px; margin-right: 5px; margin-left: 5px; padding: 30px;" />
					</form>
		</div>
			<div class="mainprosts" style="opacity: 0.9; filter: alpha(opacity=90);">
				<div class="postpro">
					<?php
						$getposts = mysqli_query($con,"SELECT * FROM posts WHERE user_posted_to='$user_name' ORDER BY id DESC LIMIT 10") or die (mysqli_error());
						while ($row = mysqli_fetch_assoc($getposts)) {
							$id = $row['id'];
							$body = $row['body'];
							$date_added = $row['date_added'];
							$added_by = $row['added_by'];
							$user_posted_to = $row['user_posted_to'];

							echo "<a href='$added_by'>$added_by</a> - $date_added -  &nbsp;&nbsp;&nbsp;$body<hr/>";

						}
					?>
				</div>
			</div>
	</div>

</div><!--container-->
<style type="text/css">
* { margin:0;
    padding:0;
}
body { background:#555 url(ff.png);
	
}
</style>

</body>

</html>