                                    <!--php coding-->

<?php
session_start();
$con=mysqli_connect('localhost','root','','fiver');
if(isset($_POST['submit']))
{
	$user=$_POST['username'];
	$pwd=$_POST['pwd'];
	$q="select * from fiver_user where name='$user' &&
	 password='$pwd'";
	 $result=mysqli_query($con,$q);
	 if(mysqli_num_rows($result)>0)
	 {
		 $_SESSION['username']=$user;
		 header("location:fiverr_related_website_design.html");
	 }
	else
	 {
	 	echo "<h6 class='alert alert-danger alert-dismissible text-center col-md-6 offset-md-3'>username and password is invalid</h6>";
	 }
	 if ($user == 'sadia' and $pwd == 'saad1#') {
		header("location:admin/admin.php");
		}

}
mysqli_close($con);
?>
                     <!--html coding-->

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
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
<div class="container m-auto">
	<div class="row mt-4 mb-4">
		<div class="col-md-6 offset-md-3 ">
			<form action=" " class="shadow-lg p-4" style="background-color:rgb(233, 227, 227);" method="POST" onsubmit="return validate_user();">
				<h1 class="text-center">SignIn</h1>
				<div class="form-group">
                    <i class="fas fa-user-alt mr-1"></i> <label>Name</label>
					<input type="text" class="form-control" name="username" id="username" autocomplete="off" >
					<span id="sname" class="text-danger"></span>
				</div>
				<div class="form-group">
                    <i class="fas fa-lock"></i> <label>Password</label>
					<input type="password" class="form-control" name="pwd" id="pwd" autocomplete="off" >
					<span id="spwd" class="text-danger"></span>
				</div>
				<input type="submit" name="submit" value="Login" class="btn btn-block btn-success">
				<p class="mt-4 mb-2 text-center">Don't have an account?<a href="signup.php">SignUp</a></p>
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
		var password=document.getElementById("pwd").value;
	if(user=="")
	{
		document.getElementById("sname").innerHTML="**name is required";
		return false;
	}if(password=="")
	{
		document.getElementById("spwd").innerHTML="**password is required";
		return false;
	}
}
</script>
                    