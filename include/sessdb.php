<?php
require 'goodonedb.php';

if (isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        $Name_Array = explode(" ", $userLoggedIn);
        if ($Name_Array[0]=="guru") {
        $user_details_query = mysqli_query($Connection, "SELECT * FROM teacherregister WHERE username='$userLoggedIn'");
          $user = mysqli_fetch_array($user_details_query);
        }else{
        $user_details_query = mysqli_query($Connection, "SELECT * FROM studentregister WHERE username='$userLoggedIn'");
          $user = mysqli_fetch_array($user_details_query);
        }
      
      }
else  {
      header("Location: landing.php");
      }
?>
 