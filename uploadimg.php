<?php
include 'include/goodonedb.php';
$getname=$_GET['name'];
      if (isset($_POST['Submit_profile'])) {
      date_default_timezone_set("Asia/kolkata");
    $image=$_FILES['Upload_Img']["name"];
    $Target="profile/".basename($_FILES["Upload_Img"]["name"]) ;
    $userLoggedIn = $_SESSION['username'];
    $Name_Array = explode(" ", $userLoggedIn);
    if ($Name_Array[0]=="guru") {
    $query="UPDATE teacherregister SET profile='$image' WHERE username ='$getname'";
    }else{
    $query="UPDATE studentregister SET profile='$image' WHERE username ='$getname'";
    }
    move_uploaded_file($_FILES["Upload_Img"]["tmp_name"],$Target);
    if (mysqli_query($Connection, $query)) {
        echo "New record created successfully";
    //header("Location:userprofile.php?name={$userLoggedIn}");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($Connection);
     //   header("Location:demo.php?messId={$userLoggedIn}");
    }}
   ?>
   