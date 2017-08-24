<?php
session_start();
require 'new.php';
?>
<Doctype! html>
<head>
<title>ABOUT TEAM</title>
<link rel="stylesheet" type="text/css" href="issue.css">
  
</head>
<body>
<div class="container">
<form method="post" action="1.php">
<table border="2" width="100%">
<tr><td>
<select name="enr" class="t2">

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
 <input type="submit" name="submit1" class="t2" value="Search"></button>
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
	<table border="1" width="100%">
<tr><td>
 Name:<input type="text" name="name"  value="<?php echo $name; ?>"  disabled/>
</td></tr>

<tr><td>
Enroll <input type="text" name="enroll"  value="<?php echo $enroll; ?>"  disabled/>
</td></tr>

<tr><td>
Year<input type="text" name="year"  value="<?php echo $year; ?>"  disabled/>
</td></tr>

<tr>
<td>
<select name="title" class="t2">
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
<td>
<select name="author" class="t2">
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
Issue date<input type="text" name="issue1"  value="<?php echo date("y-m-d"); ?>"  disabled/>
</td></tr>

<tr><td>
Return date<input type="text" name="returnDate"  value="<?php  ?>"  disabled/>
</td></tr>
<tr><td>
<input type="submit" name="submit2" value="Issue Book" class="t3">
</td></tr>
</table>





<?php
}
?>
</form>
</div>
<?php
if(isset($_POST["submit2"]))
{
	
			
$query_run=mysqli_query($conn,"select * from book WHERE title='$_POST[title]' AND author='$_POST[author]'");
	
	
if(mysqli_num_rows($query_run)>0)

{
	 $row=mysqli_fetch_array($query_run);
		
			  if($row["available"]==0)
			  {
				  echo "books not available";
			  }
			 
			 else{
			
	
	$query="insert into book_issue values('','$_SESSION[name]','$_SESSION[enroll]','$_SESSION[year]','$_POST[title]','$_POST[author]','$_POST[issue1]','')";
		
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
			  else{
				  echo "no author and book";
           
} 
			  }



 


?>

</body>
</html>