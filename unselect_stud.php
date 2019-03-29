<?php
$get_id=$GET['id'];
include 'include/sessdb.php';
$query="UPDATE portal SET stud_status=0 WHERE id ='$get_id'";
   	$execute=mysqli_query($Connection,$query);

   	if ($execute) {
   		header("Location:dashboard.php?messId={$userLoggedIn}");
   	}
   	else{
   		  echo mysqli_error($Connection);
   	   	$_SESSION["ErrorMessage"]="failed to edit ,try again later";
   	   	header("Location:dashboard.php?messId={$userLoggedIn}");
   	}

 ?>