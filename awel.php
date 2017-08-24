
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
    <div id="home" class="tab-pane fade in active">
      
<form action="awel.php" method="post" >
<div class="t1">
<h1>Add book</h1>
<div class="t2">
Title:  <input type="text" name="title" placeholder="enter tiltle" size="30" required/><br><br>
Author:  <input type="text" name="author"  placeholder="enter author" size="30" required/><br><br>

Sem:  <input type="number" name="sem" placeholder="enter semester" size="30" required/><br><br>

availability:  <input type="number" name="avail" placeholder="enter available no of books" size="30" required/><br><br></div>
<input type="submit" name="s_button" class="t2" value="Add Book"><br><br>
</div>
</form>
	  
           </div>
		   

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
</form>
 <?php
if(isset($_POST["submit4"]))
{
	?>
 <form method="post" action="">
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
  while($row=mysqli_fetch_assoc($query_run))
	   {
		$_SESSION['en']=$row['enrollment'];
  $_SESSION['title']=$row['book_title'];
  $_SESSION['author']=$row['book_author'];
		   echo "<tr><td align='center'><input type='hidden' name='en'/>";
		   echo $row['enrollment'];
		   echo "</td><td>";
		   
		   echo $row['book_title'];
		   echo "</td><td align='center'><input type='hidden' name='title'/>";
		    echo $row['book_author'];
			echo "</td><td align='center'><input type='hidden' name='author'/>";
		   echo $row['issue_date'];
		   echo "</td><td align='center'>";
		    echo $row['return_date'];
			echo "</td>";	
			
	      
		 
				

	
	echo "<td align='center'>";
	
	echo "</td>";
	?>
	<td><input type="submit" name="submit3" class="t4" value="Return"></form></td></tr>
	<?php
	   }
}
	   ?>
	   </table>
	   
	   
 

  </div>
  

 <?php
if(isset($_POST["submit3"]))
{
		$query_run=mysqli_query($conn,"update book set available=available+1 where title='$_SESSION[title]' AND author='$_SESSION[author]'");
	if($query_run)
		 echo "your fine is" ;
	 $query_r=mysqli_query($conn,"delete FROM book_issue WHERE book_title='$_SESSION[title]' AND book_author='$_SESSION[author]' AND enrollment='$_SESSION[en]'");

		
	
	
}
 
  ?>

  </form>
	</div>	   
 <div id="menu1" class="tab-pane fade">
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
 <input type="submit" name="submit1" class="t4" value="Search"></button>
 </td>
 </tr>
 </table>
 </form>
 
 
<?php
if(isset($_POST["submit1"]))
{

 

	$query_run=mysqli_query($conn,"select * from library where enrollment='$_POST[enr]'");
	   $row=mysqli_fetch_assoc($query_run);
	   $name=$row['username'];
    $enroll=$row['enrollment'];
	 $year=$row['year'];
	 
	 $_SESSION['name']=$name;
	  $_SESSION['year']=$year; 
	  $_SESSION['enroll']=$enroll;
	 
	 
	   ?>
<form method="post" action="">
	<table width="100%" height="400px">
	<col width="200">
	<col width="">
	<tr><td>
Name: </td><td> <input type="text" name="name" class="t4" value="<?php echo $name; ?>"  disabled/></div>
</td></tr>

<tr><td>
Enroll: </td><td> <input type="text" name="enroll" class="t4" value="<?php echo $enroll; ?>"  disabled/>
</td></tr>

<tr><td>
Year: </td><td><input type="text" name="year" class="t4" value="<?php echo $year; ?>"  disabled/>
</td></tr>

<tr>
<td colspan="2">
<select name="title" class="t4">
<?php $query_run=mysqli_query($conn,"select title from book");
              while($query=mysqli_fetch_assoc($query_run))
			  {
				  echo "<option>";
				  echo $query['title'];
				  echo "</option>";
			  }
			  $_SESSION['title']=$_POST['title'];

 ?>
 </td>
</tr>


 <tr>
<td colspan="2">
<select name="author" class="t4">
<?php $query_run=mysqli_query($conn,"select author from book ");
              while($query=mysqli_fetch_assoc($query_run))
			  {
				  echo "<option>";
				  echo $query['author'];
				  echo "</option>";
			  }

 ?>
 </select>
 </td>
 </tr>
 
 <tr><td>
Issue date: </td>
<td><input type="text" name="issue1" class="t4" value="<?php echo date("d-m-y");?>"  disabled/>

</td></tr>

<tr><td>
Return date: </td><td><input type="text" name="returnDate" class="t4" value="<?php echo date('d-m-y', strtotime("+4 days")); ?>"  disabled/>
</td></tr>
<tr><td colspan="2">
<input type="submit" name="submit2" value="Issue Book" class="t3">
</td></tr>
</table>

</div>




<?php
}
?>





<?php
if(isset($_POST["submit2"]))
{
	
			
$query_run=mysqli_query($conn,"select * from book WHERE title='$_POST[title]' AND author='$_POST[author]'");
	
	
       if(mysqli_num_rows($query_run)>0)
		 {
	 $row=mysqli_fetch_array($query_run);
		
			  if($row["available"]==0)
			  {
				  echo "book not available";
			  }
			 
             else
			 {
			
	$query_ru=mysqli_query($conn,"select * from book_issue WHERE book_title='$_POST[title]' AND book_author='$_POST[author]' AND enrollment='$_SESSION[enroll]'");
		
                        if(@mysqli_num_rows($query_ru)>0)
                      {
                        echo "books already issue";	
                      }
                      else{
						  $fine=0;
						  $new_date = date('d-m-y');
						  $new_date1=date('d-m-y', strtotime("+4 days"));
						 
						  
	                 $query="insert into book_issue values('','$_SESSION[name]','$_SESSION[enroll]','$_SESSION[year]','$_POST[title]','$_POST[author]','$new_date','$new_date1')";
		
                     $query_run=mysqli_query($conn,$query);
                              if($query_run)
                               {
	  
	                            $query=mysqli_query($conn,"update book set available=available-1 WHERE title='$_POST[title]' AND author='$_POST[author]'");

	
                                     echo "<script type='text/javascript'>
                                       alert('registered')
                                          </script>";

			
                                      }
                       
else{
 echo "<script type='text/javascript'>
            alert('error')
            </script>";
					  }}
			  }

}  
			  else{
				  echo "no author and book";
           
} 
			  }



 


?>






<?php 
if(isset($_POST["s_button"]))
{

$title=$_POST['title'];
$author=$_POST['author'];
$sem=$_POST['sem'];
$avail=$_POST['avail'];

$query="SELECT * FROM book WHERE title ='$title' AND author='$author'";
$query_run=mysqli_query($conn,$query);
 $row=mysqli_fetch_array($query_run);

if(@mysqli_num_rows($query_run)>0)
{
mysqli_query($conn,"update book set available=available+$avail where title='$title' AND author='$author'");
 echo "<script type='text/javascript'>
            alert('book added')
            </script>";

 }


else{

$query="insert into book values('','$title','$author','$sem','$avail')";
$query_run=mysqli_query($conn,$query);

if($query_run)
{
 echo "<script type='text/javascript'>
            alert('book added')
            </script>";

			
}
else{
 echo "<script type='text/javascript'>
            alert('error')
            </script>";
}
}

}




?>

	  
    </div>

  </div>
</body>
</html>

