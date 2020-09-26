
       <!--php coding-->

<?php
session_start();
$con=new mysqli('localhost','root','','fiver');
if(isset($_POST['submit']))
{
	$user="";
	$email="";
	$pwd="";
	$user=$_POST['username'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$repwd=$_POST['repwd'];
	$q="select * from fiver_user where name='$user' &&
	 email='$email'";
	 $result=mysqli_query($con,$q);
	 if(mysqli_num_rows($result)>0)
	 {
		 echo "<script>alert('Username and email already exist');</script>";
	 }
	 else{
	$q="insert into fiver_user(name,email,password) values('$user','$email','$pwd')";
		if(mysqli_query($con,$q))
		{
			echo  "<script>alert('Record inserted successfully');</script>";
		}
		else
		{
			echo "<script>alert('Record not inserted successfully');</script>";
			header('location:signup.php');
		}
	}
}
mysqli_close($con);
?>
                     <!--html coding-->

<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    
    <!--FONT AWESOME CSS-->
    <link rel="stylesheet" type="text/css" href="all.min.css">
    <!--GOOGLE FONT-->

    <!-- CUSTOM CSS-->
   <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	  <!------------------------Start navigation---------------------->
	  <div class="container">
       
        <div class="navbar">
        <div class="logo">
         <h1>freelancer</h1>
        </div>
        <div class="menu">
          <ul class="list">
              <li class="no_result"><a href="index.html">FIVER business</a></li>
              <li class="translator"><i class="fas fa-globe"></i> English</li>
              <li class="rupee">RsPKR</li>
              <li><a href="become_a_seller.html">Become a seller</a></li>
              <li><a href="sign_in.php">Sign_in</a></li>
              <button><a href="signup.php">Join</a></btton>
          </ul>
        </div>
	</div>
</div>
<div class="container m-auto p-4">
	<div class="row p-0 mt-1 mb-2">
		<div class="col-md-6 offset-md-3 ">
			<form action="signup.php"  style="background-color:rgb(233, 227, 227);" class="shadow-lg p-4" method="POST" onsubmit="return validate_user();">
				<h1 class="text-center">Signup</h1>
				<div class="form-group">
                    <i class="fas fa-user-alt mr-1"></i> <label>Name</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Only character are allowed" autocomplete="off">
					<span id="sname" class="text-danger"></span>
				</div>
				<div class="form-group">
                    <i class="fas fa-envelope"></i> <label>Email</label>
					<input type="text" class="form-control" name="email" id="email"autocomplete="off">
					<span id="semail" class="text-danger"></span>
				</div>
				<div class="form-group">
                    <i class="fas fa-lock"></i> <label>Password</label>
					<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password should have atleast one number and one special character" autocomplete="off">
					<span id="spwd" class="text-danger"></span>
				</div>
				<div class="form-group">
                    <i class="fas fa-key"></i> <label>Re-type Password</label>
					<input type="password" class="form-control" name="repwd" id="repwd"autocomplete="off">
					<span id="srepwd" class="text-danger"></span>
				</div>
				    <input type="submit" name="submit" value="Create your account" class="btn btn-success btn-block">
				    <p class="mt-4 mb-2 text-center">Already have an account?<a href="sign_in.php">SignIn</a></p>
			</form>
		</div>
	</div>
</div>

<script src="bootstrap.min.js"></script>
<script src="all.min.js"></script>
</body>
</html>

                  <!--Javascript code-->
<script type="text/javascript">
	function validate_user(){
		var user=document.getElementById("username").value;
		var email=document.getElementById("email").value;
		var password=document.getElementById("pwd").value;
		var repassword=document.getElementById("repwd").value;
		var usercheck=/^[a-zA-Z ]{4,20}$/;
		var emailcheck=/^[a-zA-Z0-9._@]{4,20}@[a-zA-Z]{5,7}.{1}[a-z]{3}$/;
		var pwdcheck=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,20}$/;
    if(usercheck.test(user))
    {
    	document.getElementById("sname").innerHTML="";
		
	}else{
		document.getElementById("sname").innerHTML="username is invalid";
		return false;
	}
	if(emailcheck.test(email))
    {
    	document.getElementById("semail").innerHTML="";
	}else{
		document.getElementById("semail").innerHTML="email is invalid";
		return false;
	}
	if(pwdcheck.test(password))
    {
    	document.getElementById("spwd").innerHTML="";
	}else{
		document.getElementById("spwd").innerHTML="password is invalid";
		return false;
	}
    if(password==repassword)
    {
    	document.getElementById("srepwd").innerHTML="";
	}else{
		document.getElementById("srepwd").innerHTML="password does not match";
		return false;
	}
}
</script>