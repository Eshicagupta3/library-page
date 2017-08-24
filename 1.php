
<?php
session_start();
require 'new.php';

?>

<DOCTYPE! html>
<head>
<title>Admin welcome page</title>
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    
   
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="awel.css">



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



<div class="container">
<div class="up-padding">
 <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">ADD book</a></li>
    <li><a data-toggle="pill" href="#menu1">Issue Book</a></li>
    <li><a data-toggle="pill" href="#menu2">Return Book</a></li>
  </ul>
  </div>
  <div class="tab-content">
    
  		   <div id="menu2" class="tab-pane fade">
  
  <div class="up-padding1">
	  <form method="post" action="">
<table border="2" width="100%">
<tr><td>
<select name="enr" class="t4">

<?php $query_run=mysqli_query($conn,"select enrollment from library");
              while($query=mysqli_fetch_assoc($query_run))
			  {
				  echo "<option>";
				  echo $query['enrollment'];
				  echo "</option>";
			  }

 ?>
 </select>
 </td>
 
 
<td>
 <input type="submit" name="submit4" class="t4" value="Search"></button>
 </td>
 </tr>
 </table>

 <?php
if(isset($_POST["submit4"]))
{
	?>

		<table border="2" width="100%" height="400px">
<tr>
<th>Enrollment</th>
<th>book_title</th>
<th>book_author</th>
<th>issue_date</th>
<th>return_date</th>
<th>fine</th>
<th>to return</th>
</tr>

 <?php
	$query_run=mysqli_query($conn,"select * from book_issue where enrollment='$_POST[enr]'");
 $row=mysqli_fetch_assoc($query_run);
  $_SESSION['en']=$row['enrollment'];
  $_SESSION['title']=$row['book_title'];
  $_SESSION['author']=$row['book_author'];
	   ?>
		
		   <tr><td align='center' id="en"><input type='hidden' name='en'/>
		  <?php echo $row['enrollment'];?>
		   </td><td align='center' id="title"><input type='hidden' name='title' value=''/>
		   
		  <?php echo $row['book_title'];?>
		   </td><td align='center' id="author"><input type='hidden' name='author'/>
		   <?php echo $row['book_author'];?>
			</td><td align='center'><input type='hidden' name='idate'/>
		  <?php echo $row['issue_date'];?>
		   </td><td align='center'>
		    <?php echo $row['return_date'];?>
			</td>		
	     
	<td align='center'></td><td><input type='submit' name='submit3' class='t4' value='Return'></td></tr>
	
	
	<?php   
}


	   ?>
	   </table>
  </form>
</div>
 <?php
if(isset($_POST["submit3"]))
{
$query_run=mysqli_query($conn,"update book set available=available+1 where title='$_SESSION[title]' AND author='$_SESSION[author]'");
	if($query_run)
		 echo $_SESSION['title'];
		
	
	
}
 
  ?>

	</div>	   
 


	  
    </div>

  </div>
</body>
</html>

