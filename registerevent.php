<?php 

//require_once("include/goodonedb.php");
include 'include/navheader.php';

 ?></ul></div></div></nav> 
 <?php 
	
if (isset($_POST['Submit'])) {
   
    
	$HOSTNAME=mysqli_real_escape_string($Connection,$_POST["HostName"]);
	$EVENTNAME=mysqli_real_escape_string($Connection,$_POST["EventName"]);
	$CONTACT=mysqli_real_escape_string($Connection,$_POST["Contact"]);
    date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
    $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
    $datetime;
    $GOOGLEFORM=mysqli_real_escape_string($Connection,$_POST["GoogleForm"]);
    $INFO=mysqli_real_escape_string($Connection,$_POST["Info"]);
   
    $image=$_FILES['Image']["name"];
    $Target="Upimg/".basename($_FILES["Image"]["name"]) ;
   
  //  $Admin="Aman Negi";
    if (empty($HOSTNAME)){
   	 $_SESSION["ErrorMessage"]="NAME can not be empty";
     header("Location:registerevent.php");
     exit;
  //or  Redirect_to("dashboard.php");//through functions .php
   }
   elseif(strlen($HOSTNAME)>13){
    $_SESSION["ErrorMessage"]="To long Name";
     header("Location:registerevent.php");
     exit;
   }
   elseif (strlen($HOSTNAME)<3) {
    $_SESSION["ErrorMessage"]="To SHORT Name";
     header("Location:registerevent.php");
     exit;
   }
   else{
   	   $usercolname=$user['collegename'];
        
   	   $query1="INSERT INTO currentevent(datetime,hostname,image,googleform,eventname,info,contact,collegename)
   	    VALUES('$datetime','$HOSTNAME','$image','$GOOGLEFORM','$EVENTNAME','$INFO','$CONTACT','$usercolname')";
   		move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);

if (mysqli_query($Connection, $query1)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query1 . "<br>" . mysqli_error($Connection);
}
   }//end of the else


}//end of the if submit*/
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
	<title></title>
</head>
<body>
	   
    
<div class="container-fluid">
	<div class="row">
		
		
		<?php include 'dash_left_bar.php'; ?>
		
		<div class="col-sm-10"><!--middle div-->
			<h1>Add New Event</h1>
			
			<div >
				<?php 
                 
             
				 
				 ?>
			</div>
			<div>
				<form action="registerevent.php" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="form-group">
						<label for="Name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Host Name:</span></label>

						<input class="form-control" type="text" name="HostName" id="name" placeholder="Name of the Host">
					</div>
					<div class="form-group">
						<label for="eventname">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Event Name:</span></label>

						<input class="form-control" type="text" name="EventName" id="age" placeholder="Name of the Event">
					</div>

					
					 <div class="form-group">
						<label for="SelectImage">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Select Images:</span></label>

						<input class="form-control" type="file" name="Image" id="image">
					</div>

					<div class="form-group">
						<label for="eventname">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Registration Form:</span></label>

						<input class="form-control" type="text" name="GoogleForm" id="googleform" placeholder="Paste Your form link here">
					</div>
                    
                    <div class="form-group">
						<label for="contact">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Contact No :</span></label>

						<input class="form-control" type="Number" name="Contact" id="contact" placeholder="Your Contact NO">
					</div>



					<div class="form-group">
						<label for="info">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Your Information:</span></label>

						<textarea class="form-control"  name="Info" id="info" placeholder="Put Your Info here"></textarea>
					</div>
						<br>
						<input class="btn btn-success" type="submit" target="_self" name="Submit" value="Add New Event">
					</fieldset><br>
				</form>
			</div>

           
		 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

		</div><!--end of the middle div-->
	</div><!--end of the row div-->
	
</div><!--end of the container fluid class -->
<footer style="background-color: black" class="Footer"><hr>
	<p>Page By || Aman Negi  || &copy:2018-2020 -------All right reserved</p>
	<p>
		This Site is only used for study purpose.
	</p>
	<hr>
</footer>
</body> 
</html>
