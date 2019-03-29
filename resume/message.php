<?php
if (isset($_POST['mess_submit'])) {
 	$text_message=mysqli_real_escape_string($Connection,$_POST["Text"]);
    date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
    $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
    $userLoggedIn = $_SESSION['username'];
    $Name_Array = explode(" ", $userLoggedIn);
    if ($Name_Array[0]=="guru") {
    $user_id=$user['teachid'];
    }else{
    $user_id=$user['id'];	
    }
    $query="INSERT INTO comments (datetime,user_id,comment,post_id) values ('$datetime','$user_id','$text_message','$urlId')";
    if (mysqli_query($Connection, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($Connection);
}
 } 
?>