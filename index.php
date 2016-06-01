<style type="text/css">
* { margin:0;
    padding:0;
}
body { background:#555 url(ff.png);
	
}
</style>
<?php include ("./inc/header.inc.php"); ?>
<?php
	$reg = @$_POST['reg'];
	//declaring variable to prevent error
	$fn = ""; //first name
	$ln =""; //last name
	$un = ""; //username
	$em = ""; //email
	$em2 = ""; //email2
	$pswd = ""; //password
	$pswd2 = ""; //password2
	$d = ""; //sign up date
	$u_check = ""; //check if username exists

	//register form
	$fn = strip_tags(@$_POST['fname']);
	$ln = strip_tags(@$_POST['lname']);
	$un = strip_tags(@$_POST['username']);
	$em = strip_tags(@$_POST['email']);
	$em2 = strip_tags(@$_POST['email2']);
	$pswd = strip_tags(@$_POST['password']);
	$pswd2 = strip_tags(@$_POST['password2']);
	$d = date("Y-m-d"); //day,month,year

	if ($reg) {
		if ($em==$em2) {
			//check if user already exits
			$u_check = mysqli_query($con,"SELECT username FROM users WHERE username='$un'");
			//count the amonunt of rows
			$check = mysqli_num_rows($u_check);
//check email alredy take or not
			$e_check = mysqli_query($con,"SELECT email FROM users WHERE email='$em'");

//count the number rows returned
			$email_check = mysqli_num_rows($e_check);
			if ($check == 0) {
				if ($email_check == 0) {
				//check all of the fields have been filed in
				if ($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
					//check the password match
					if ($pswd==$pswd2) {
						//check the maximun lenght of username /first name/last name/ dose not exceed 25 char.
						if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
							echo "The maximun limit for username/first name/last name is 25 characture!";
						}
						else
						{
							// check the maximum and password does not exceed 25 characters and is not less than 5 charaters.
							if (strlen($pswd)>30||strlen($pswd2)<5) {
								echo "Your Password must be beetween 5 and 30 charaters long!";
							}
							else{
								//encrypt password
								$pswd = md5($pswd);
								$pswd2 = md5($pswd2);
								$query = mysqli_query($con,"INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d','0','','','')");
								die ("<h2>Welcome to 3F!<small>Find Friend with Friends!</small></h2>Login to your account for start....");
						}
					}
				}
				else {
					echo "Your password doesn't match!";
				}
			}
			else
			{
				echo "Please fill in all of the fields";
			}
		}
			else
	{
		echo "Sorry,but this email looks like someone else use this email try new! ";
	}
	}
		else
		{
			echo "Username already taken";
		}
	}
	else
	{
		echo "Your Email don't match!";
	}
}

//User login
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]);//filter everything but num n let
	$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]);//felter everything
	$password_login_md5 = md5($password_login);
	$sql = mysqli_query($con,"SELECT id FROM users WHERE username='$user_login' AND password='$password_login_md5' LIMIT 1"); //query
	//check for thei existence

	$userCount = mysqli_num_rows($sql); //count the number of rows returns
	if ($userCount == 1) {
		while($row = mysqli_fetch_array($sql)){
			$id = $row["id"];
		}
		$_SESSION["user_login"] = $user_login;
		header("location: home.php");
		exit();
	}
	else{
		echo 'That Information is Incorrect.Please try again.';
		exit();
	}
}

?>
<!--connect code finidh-->

<div class="container-fluid">
	<div class="col-md-12 rog">
		<div class="col-md-3" style="background: #101010; padding-left: 20px; padding-bottom: 60px; padding-right: 20px; margin-top:100px; opacity: 0.8;
    filter: alpha(opacity=80);">
			<div class="rightt">
				<div class="ggg">
						<p class="jj">Already a Member? Sign in below!</p><hr/>
					<form action="index.php" method="POST">
						<input class="form-control" type="text" name="user_login" size="25" placeholder="Username" /></br>
						<input class="form-control" type="text" name="password_login" size="25" placeholder="Password" /></br>
						<input type="submit" name="login" class="btn btn-primary" value="Login" />
						<hr/>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-5"></div>
			<div class="col-md-4" style="background: #101010; padding:20px; margin-top: 30px; opacity: 0.8;
    filter: alpha(opacity=80);">
				<div class="navbar-left">
				  <table style="margin-left: 5px;">
					<td width="50%" valign="top">
						<p class="jj" style="text-align:center;">Sign Up Below</p><hr/>
						<form action="#" method="POST">
							<input class="form-control" type="text" name="fname" size="25" placeholder="Firstname"></input></br>
							<input class="form-control" type="text" name="lname" size="25" placeholder="Lastname"></input></br>
							<input class="form-control" type="text" name="username" size="25" placeholder="Username"></input></br>
							<input class="form-control" type="text" name="email" size="25" placeholder="Email Address"></input></br>
							<input class="form-control" type="text" name="email2" size="25" placeholder="Email Address (again)"></input></br>
							<input class="form-control" type="text" name="password" size="25" placeholder="Password"></input></br>
							<input class="form-control" type="text" name="password2" size="25" placeholder="Password (again)"></input></br>
							<input type="submit" name="reg" class="btn btn-primary" value="Sign Up!"></input>
							<hr/>
						</form>
					</td>
				  </table>
				</div>
			</div>

	</div>
</div>
<?php include ("./inc/footer.inc.php"); ?>