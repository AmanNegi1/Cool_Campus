<?php 
$arr = [];
$arr['first'] = $_POST['fname'];
$arr['last'] = $_POST['lname'];
$arr['age'] = $_POST['age'];

$con=new mysqli("localhost","root","","ajaxtest");
$sql = "INSERT INTO `names` (`first`, `last`, `age`) VALUES ('".$arr['first']."', '".$arr['last'] ."', '".$arr['age']."' );";

if($con->ping()){
     $arr['connected']  = true ;
}else{
        $arr['connected']  = false; 
}

if ($con->query($sql) === TRUE) {
    $arr['xstatus']  = "Created" ;
    $arr['id']  = $con->insert_id;
}else{
    $arr['xstatus']  = "Error" ;
    $arr['message']  = $con->error;
}

echo json_encode($arr);

?>