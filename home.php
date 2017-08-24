<?php
session_start();
require 'new.php';
?>

<html>
<head>
<title>Library</title>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
 
    
  <link rel="stylesheet" type="text/css" href="home.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  
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
	<img src="4.jpg" class="image">
	
	
	<form action="home.php" method="post" >
<input type="submit" name="search" class="t2" value="Search">
   <input type="text" name="title" class="t3" placeholder="enter tiltle of book" \required/>
   <span class="t1 glyphicon glyphicon-search"></span><br><br>

</form>

<?php
if(isset($_POST["search"]))
{
	?>
	
	<table border="2" width="100%">
<tr><th>isbn</td>
<th>title</th>
<th>author</th>
<th>sem</th>
<th>avail</th>
</tr>

<?php
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
	echo "<p class='t5'> book is not available";
}


}

?>
</table>

</body>
</html>