
<?php
session_start();
require 'new.php';

?>
<DOCTYPE! html>
<head>
<title>form</title>
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    
   
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="register.css">

</head>
<body>
<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="navbar-brand"><a href="admin.php">Admin login</div></a>
    </div>

<ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
	</div>
	</nav>
<img src="1.jpg" class="image">

<div class="container">
<form action="register.php" method="post" >
<center>
<h1><u>REGISTER PAGE<br></u></h1></center>
<div class="t1">
<div class="t2">username:  <input type="text" name="username" placeholder="enter username" required/><br><br>
password:  <input type="password" name="password"  placeholder="enter password" required/><br><br>
confirm password:  <input type="password" name="cpassword" placeholder="enter confirm pass" required/><br><br>
Branch:  <input type="text" name="branch" placeholder="enter branch" required/><br><br>

Year:  <input type="number" name="year" placeholder="enter current year" required/><br><br>


<input type="submit" name="s_button" class="t4" value="sign up"></button/><br><br><br></div>
<a href="login.php" class="t3"> Back </a>
</div>
</form>
</div>
<?php 
if(isset($_POST["s_button"]))
{
$username=$_POST['username'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$branch=$_POST['branch'];
$year=$_POST['year'];


if($password==$cpassword)
{
$query="SELECT * FROM library WHERE username ='$username'";
$query_run=mysqli_query($conn,$query);

if(@mysqli_num_rows($query_run)>0)
{
 echo "<script type='text/javascript'>
            alert('username exist')
            </script>";
}


else{

$query="insert into library values('$username','$password','','$branch','$year')";
$query_run=mysqli_query($conn,$query);

if($query_run)
{
 echo "<script type='text/javascript'>
            alert('registered')
            </script>";

			
}
else{
 echo "<script type='text/javascript'>
            alert('error')
            </script>";
}
}

}

else
{
     echo "<script type='text/javascript'>
            alert('pss differ')
            </script>";
}

}

?>
</body>
</html>
