<?php
$get_id=$GET['id'];
include 'include/sessdb.php';
$query="UPDATE portal SET stud_status=1 WHERE id ='$get_id'";
   	$execute=mysqli_query($Connection,$query);
	if ($execute) {
   	header("Location:dashboard.php?messId={$userLoggedIn}");
   	}
   	else{
   	    echo mysqli_error($Connection);
    	header("Location:dashboard.php?messId={$userLoggedIn}");

    	//header("Location:dashboard.php");
   	}

 ?>