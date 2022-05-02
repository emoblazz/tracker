<?php 

include('../dist/includes/dbcon.php');

	$cat_name = $_POST['cat_name'];
	
	mysqli_query($con,"INSERT INTO category(cat_name) VALUES('$cat_name')")or die(mysqli_error());  
	echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
	echo "<script>document.location='category.php'</script>";   
	
	
?>