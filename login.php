<?php session_start();

include('dist/includes/dbcon.php');


$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];

$username = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,$pass_unsafe);
$pass=md5($pass);

$query=mysqli_query($con,"select * from admin where username='$username' and password='$pass'")or die(mysqli_error($con));
		$row=mysqli_fetch_array($query);
           $id=$row['admin_id'];
           $fullname=$row['fullname'];
           $username=$row['username'];
           $pic=$row['pic'];
           $counter=mysqli_num_rows($query);
		  	if ($counter == 0) 
			  {	
			 	 echo "<script type='text/javascript'>alert('Invalid Username or Password!');
			  	 document.location='index.php'</script>";
			  } 
			  elseif ($counter > 0)
			  {
				  $_SESSION['id']=$id;
				  $_SESSION['pic']=$pic;
				  $_SESSION['name']=$fullname;

				  echo "<script type='text/javascript'>document.location='admin/index.php'</script>";
			  }
?>

