<?php 

   include 'include/sessdb.php';
   if (isset($_POST['submit_edit'])) {
    $Col_name=mysqli_real_escape_string($Connection,$_POST["Col_name"]);
   // $Col_name=str_replace(' ', '', $Col_name);//remove spaces..
    $Col_name=ucfirst(strtolower($Col_name));
    $Rank=mysqli_real_escape_string($Connection,$_POST["Rank"]);
    $Col_img=$_FILES['Col_img']["name"];

    $Target="upimg/".basename($_FILES["Col_img"]["name"]) ;
     date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
    $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
    $datetime;
    $user_log_id=$user['teachid'];
    $query1="UPDATE colleges SET date_time='$datetime',name='$Col_name',world_rank='$Rank',image='$Col_img'";
    move_uploaded_file($_FILES["Col_img"]["tmp_name"],$Target);
if (mysqli_query($Connection, $query1)) {
    echo "New record created successfully";
    header("Location:dashboard.php?messId={$userLoggedIn}");
} else {
    echo "Error: " . $query1 . "<br>" . mysqli_error($Connection);
}
   }
?> 