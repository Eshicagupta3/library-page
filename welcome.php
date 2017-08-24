<?php
session_start();
require 'new.php';
?>
<html>
<head>
<title>ABOUT TEAM</title>
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    
   
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="welcome.css">
<style>

.up-padding1{
	margin-top: 10%;
}
.t3{
	font-size: 20px;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="navbar-brand"><a href="admin.php">Admin login</div></a>
    </div>

<ul class="nav navbar-nav navbar-right">
<li><br><font color="white">welcome
<?php echo $_SESSION['username']; ?></font></li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
	</div>
	</nav>

<div class="container">
  
<div class="up-padding1">
<form action="welcome.php" method="post" ></div>
<input type="submit" name="search" class="t3" value="Search"> <span class="glyphicon glyphicon-search">:  <input type="text" name="title" placeholder="enter tiltle of book" \required/></span><br><br>



<table border="2" width="100%">
<tr><th>isbn</td>
<th>title</th>
<th>author</th>
<th>sem</th>
<th>avail</th>
</tr>


<?php
if(isset($_POST["search"]))
{
$title=$_POST['title'];
$query="SELECT * FROM book WHERE title ='$title'";
$query_run=mysqli_query($conn,$query);

 if(mysqli_num_rows($query_run)>0)
{
 while($row=mysqli_fetch_assoc($query_run))
 {
	$i= $row['isbn'];
	 $a=$row['author'];
	 $t=$row['title'];
	 $s=$row['sem'];
	  $v=$row['available'];
	echo "<tr>
	<td>$i</td>
<td>$a</td>
<td>$t</td>
<td>$s</td>
<td>$v</td>
</tr>";
 }

}
else
{
	echo "no book";
}


}

?>
</table>

<form action="welcome.php" method="post" >
<input type="submit" name="logout" value="logout"/><br>
</form>

<?php
if(isset($_POST["logout"]))
{
	session_destroy();
		header('location: login.php');
}
?>

</div>

</body>
</html>