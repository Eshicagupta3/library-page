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
<link rel="stylesheet" type="text/css" href="wel.css">
</head>

<body>
<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <div class="navbar-brand">	   <form action="" method="post" >
<input type="submit" name="logout" value="logout" />
</form></div>
    </div>

<ul class="nav navbar-nav navbar-right">
<li><br><font color="white">welcome
<?php echo $_SESSION['username']; ?></font></li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
	</div>
	</nav>
	<div class="t1">
	<h3>Issued Books</h3>
	</div>
		<table border="2" width="100%" height="400px">
<tr>
<th>Enrollment</th>
<th>book_title</th>
<th>book_author</th>
<th>issue_date</th>
<th>return_date</th>
<th>fine</th>
</tr>
	<?php
	
	
	$query_run=mysqli_query($conn,"select * from book_issue where enrollment='$_SESSION[enrollment]'");
	   while($row=mysqli_fetch_assoc($query_run))
	   {
		   echo "<tr><td align='center'>";
		   echo $row['enrollment'];
		   echo "</td><td>";
		   
		   echo $row['book_title'];
		   echo "</td><td align='center'>";
		    echo $row['book_author'];
			echo "</td><td align='center'>";
		   echo $row['issue_date'];
		   echo "</td><td align='center'>";
		    echo $row['return_date'];
			echo "</td>";	
			
	   

	?>
	<td align='center'></td></tr>
	<?php
	   }
	   ?></table>
	   
	   


<?php
if(isset($_POST["logout"]))
{
	session_destroy();
		header('location: home.php');
}
?>

	   
	</body>
	</html>
	