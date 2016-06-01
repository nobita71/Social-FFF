<style type="text/css">
* { margin:0;
    padding:0;
}
body { background:#555 url(ff.png);
	
}

</style>
<html>
<?php
include ("./inc/header.inc.php");
if ($user_name) {

}
else
{
	die ("You must be login to this page");
}
?>
<?php
$senddata = @$_POST['senddata'];
//variable place
$old_password = strip_tags(@$_POST['oldpassword']);
$new_password = strip_tags(@$_POST['newpassword']);
$repeat_password = strip_tags(@$_POST['newpassword2']);

if ($senddata) {
	//if form submited
	$password_query = mysqli_query($con,"SELECT * FROM users WHERE username='$user_name'");
	while ($row = mysqli_fetch_assoc($password_query)) {
		$db_password = $row['password'];
		//md5 password
		$old_password_md5 = md5($old_password);

		if ($old_password_md5 == $db_password) {
			//continue
			//echo "great!Your password match!";
			//check between two password
			if ($new_password == $repeat_password) {
				if(strlen($new_password) <= 4){
					echo "Sorry!But your password must need to long more then 4 character.";
				}
				else
				{
				//md5
				$new_password_md5 = md5($new_password);
				//update the users password!
				$password_update_query = mysqli_query($con,"UPDATE users SET password='$new_password_md5' WHERE username='$user_name'");
				echo "Success! Your password is Update!";
				}
			}
			else
			{
				echo "Your two password don't match!";
			}

		}
		else
		{
			echo "The old password is incrorrect!";
		}
	}

}
else
{
	echo "";
}
$updateinfo = @$_POST['updateinfo'];
//first name,lastname,user query
$get_info = mysqli_query($con,"SELECT first_name, last_name, bio FROM users WHERE username='$user_name'");
$get_row = mysqli_fetch_assoc($get_info);
$db_firstname = $get_row['first_name'];
$db_lastname = $get_row['last_name'];
$db_bio = $get_row['bio'];
//submit database
if ($updateinfo) {
	$firstname = strip_tags(@$_POST['fname']);
	$lastname = strip_tags(@$_POST['lname']);
	$bio = @$_POST['bio'];
	if (strlen($firstname) <= 3) {
		echo "Your first name must be 3 or more chararter long!";
	}
	else if (strlen($lastname) <= 4){
		echo "Your last name must be 4 or more chararter long!";
	}
	else
	{
		//submit the data into database!
		$info_submit_query = mysqli_query($con,"UPDATE users SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$user_name'");
		echo "Your Profile info has been update!";
		header("Location: $user_name");
	}
}
else{
	//do nothikng here
}
//check user has uploaded a profile photo
$check_pic = mysqli_query($con,"SELECT profile_pic FROM users WHERE username='$user_name'");
$get_pic_row = mysqli_fetch_assoc($check_pic);
$profile_pic_db = $get_pic_row['profile_pic'];
if ($profile_pic_db == "") {
	$profile_pic = "img/default_pic.jpg";
}
else
{
	$profile_pic = "userdata/profile_pic/".$profile_pic_db;
}
//profile photo 
if (isset($_FILES["profilepic"])) {
	if (((@$_FILES["profilepic"]["type"] == "image/jpeg") || (@$_FILES["profilepic"]["type"] == "image/png") || @$_FILES["profilepic"]["type"] =="image/gif")) //img
{
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$rand_dir_name = substr (str_shuffle($chars),0, 15);
	mkdir("userdata/pro_pic/$rand_dir_name");

	if (file_exists("userdata/pro_pic/$rand_dir_name/".@$_FILES["profilepic"]["name"])){
		echo @$_FILES["profilepic"]["name"] ." Already Exists!";
	}
	else
	{
		move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/pro_pic/$rand_dir_name/".$_FILES["profilepic"]["name"]);
		//echo "Uploaded and stored in: userdata/pro_pic/$rand_dir_name/".@$_FILES["profilepic"]["name"];
		$profile_pic_name = @$_FILES["profilepic"]["name"];
		$profile_pic_query = mysqli_query($con,"UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user_name'");
		header("Location: A_S.php");
	}
}
else
{
	echo "Invailid file!Your Image is not coreect!";
}
}
?>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>
<body>
<div class="container">
	<div class="col-md-12"><h1 style="text-align: center; font-family: times; color: blue;">Edit Your Profile Here...</h1><hr/></div>
	<div class="col-md-12" style="background-color: black;
    							border: 1px solid black;
   								opacity: 0.9;
    							filter: alpha(opacity=90); margin-bottom: 5px;">
    <div class="col-md-3"></div>
    <div class="col-md-6">
	<h3 align="center" style="color:white; font-family: courier">UPLOAD YOUR PROFILE PHOTO!<hr/></h3>
	<form action="" method="POST" enctype="multipart/form-data">
	<img src="<?php echo $profile_pic; ?>" width="80"/>
	<div class="col-md-6" style="margin-top: 32px;"><input class="form-control" type="file" name="profilepic" /><br/></div>
	<input type="submit" class="btn btn-primary" name="uploadpic" value="upload photo"><br/><br/>
	</form>
	<hr/>
	</div>
	<div class="col-md-3"></div>
	</div>

	<div class="col-md-12">
		<div class="col-md-5" style="background-color: black;
    							border: 1px solid black;
   								opacity: 0.9;
    							filter: alpha(opacity=90);">
    			<h3 align="center" style="color:white; font-family: courier">Edit Your Account Blow <br/><br/><small>Update Profile Info...</small><hr /></h3><br />
    				<form action="A_S.php" method="post">
	<!--this is finish change password from-->
						<input class="form-control" type="text" name="fname" size="25" placeholder="FirstName" value="<?php echo $db_firstname; ?>" /></br>
						<input class="form-control" type="text" name="lname" size="25" placeholder="LastName" value="<?php echo $db_lastname; ?>" /></br>
						<textarea class="form-control" name="bio" rows="2" cols="68" style=" margin-top: 5px;" placeholder="About You-Bio Information"><?php echo $db_bio; ?></textarea><br/>
						<input type="submit" name="updateinfo" class="btn btn-default" value="Update Info..."/><br/><br /><br/>
					</form>
    	</div>
    	<div class="col-md-2"></div>
			<div class="col-md-5" style="background-color: black;
   									border: 1px solid black;
   									opacity: 0.9;
    								filter: alpha(opacity=90);">
				<h3 align="center" style="color:white; font-family: courier">Edit Your Account Blow <br/><br/><small>Change Password...</small><hr /></h3><br />
					<form action="A_S.php" method="post">
						<input class="form-control" type="password" name="oldpassword" size="25" placeholder="Old Password" /></br>
						<input class="form-control" type="password" name="newpassword" size="25" placeholder="New Password" /></br>
						<input class="form-control" type="password" name="newpassword2" size="25" placeholder="Repeat Password" /></br>
						<input type="submit" name="senddata" class="btn btn-default" value="Update Info..."/><br/><br /><br/>
					</form>
			</div>
		</div>
</div>
</div>
</body>
</html>
