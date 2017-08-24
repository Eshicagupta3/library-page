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
<link rel="stylesheet" type="text/css" href="login.css">
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
<div class="t1">
<u><b>Student login</u></b><br><br>
<form action="login.php" method="post">
<div class="t4">username: <input type="text" name="username"  placeholder="enter username"><br><br>
password: <input type="password" name="password" placeholder="enter password" ><br></div>
<br>
<input type="submit" name="login" value="Login" class="t2">
</form>
</div>
</div>



<?php 
if(isset($_POST["login"]))
{
$username=$_POST['username'];
$password=$_POST['password'];
$query="SELECT * FROM library WHERE username ='$username' AND password='$password'";
$query_run=mysqli_query($conn,$query);

if(mysqli_num_rows($query_run)>0)
{
//valid
$_SESSION['username']=$username;
$row=mysqli_fetch_assoc($query_run);

$_SESSION['enrollment']=$row['enrollment'];
			header('location: wel.php');
}
else
{
	
	echo "<script type='text/javascript'>
            alert('user name or password incorrect')
            </script>";
}
}
?>
</body>
</html>