<?php include 'include/headsection.php'; ?>
<?php require_once("include/navheader.php"); 
$getname=$_GET['messId'];
?>  

  </ul></div></div></nav>
<?php 
   if (isset($_POST['submit_rep'])) {
    $Col_name=mysqli_real_escape_string($Connection,$_POST["Col_name"]);
    $Col_name=str_replace(' ', '', $Col_name);//remove spaces..
    $Col_name=ucfirst(strtolower($Col_name));

    $Rank=mysqli_real_escape_string($Connection,$_POST["Rank"]);
    $Col_img=$_FILES['Col_img']["name"];
    $Target="upimg/".basename($_FILES["Col_img"]["name"]) ;
     date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
    $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
    $datetime;
    $user_log_id=$user['teachid'];
    $query1="INSERT INTO colleges(date_time,name,image,world_rank,user_id)
        VALUES('$datetime','$Col_name','$Col_img','$Rank','$user_log_id')";
    move_uploaded_file($_FILES["Col_img"]["tmp_name"],$Target);
if (mysqli_query($Connection, $query1)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query1 . "<br>" . mysqli_error($Connection);
}
   }
?>
 
<div class="container-fluid">
	<div class="row">
		
<?php include 'dash_left_bar.php'; ?>
		<div class="col-sm-10"><!--middle div-->
		<div class="jumbotron">
      <div class="row">
        <?php
        $user_log_col=$user['collegename'];
        $viewquery="SELECT * from colleges WHERE name='$user_log_col'";
        
        $execute=mysqli_query($Connection,$viewquery);
         
         if (!$execute) 
         {
         printf("Error: %s\n", mysqli_error($Connection));
         exit();
         }
         $dataRows=mysqli_fetch_array($execute); 
        ?>
        <div class="col-sm-4">
          <a id="col_profile" href="edit_col_profile.php"><img src="upimg/<?php echo($dataRows['image']); ?>" style="border-radius: 5px;"></a>
          <span><?php echo ucfirst(($dataRows['name'])); ?></span><br>
          <span style="background-color:#91fc58;">Rank:<?php echo($dataRows['world_rank']); ?></span>
        </div>
        <div class="col-sm-6" style="float: right;">
          <?php
        $user_log_col_name=$user['collegename'];
        $check_database_query = mysqli_query($Connection, "SELECT name FROM colleges WHERE name='$user_log_col_name'");
        $check_login_query = mysqli_num_rows($check_database_query);
        if($check_login_query >= 1) {  ?>
           <form action="edit_col_profile.php" enctype="multipart/form-data" method="post" > 
              <div class="input-group">
              <span class="input-group-addon">Name</span>
                <input id="Col_name" type="text" class="form-control" name="Col_name" value="<?php echo($dataRows['name']); ?>" placeholder="Enter Your College Name">
              </div>
              <img style="width: 4cm;height: 2cm;" src="upimg/<?php echo($dataRows['image']); ?>">
              <div class="input-group">

                <span class="input-group-addon">Picture</span>
                <input id="Col_img" type="file" class="form-control" name="Col_img" placeholder="Image of Your College">
              </div>
              
              <div class="input-group">
                <span class="input-group-addon">World Rank</span>
                <input id="Rank" type="number" class="form-control" name="Rank" value="<?php echo($dataRows['world_rank']); ?>" placeholder="Rank of Your College">
              </div>
          <input class="btn btn-danger"  type="submit" class="form-control" value="Edit" name="submit_edit" >
    
  </form>           
        <?php }
          else if ($check_login_query == 0) {
            
        ?>
           <form action="dashboard.php?messId=<?php echo $userLoggedIn; ?>" enctype="multipart/form-data" method="post" > 
              <div class="input-group">
              <span class="input-group-addon">Name</span>
                <select class="form-control" name="Col_name">
                  <option><?php 
                   $user_col_name=$user['collegename'];
                   echo($user_col_name);
                   ?></option>
                </select>
               <!-- <input id="Col_name" type="text" class="form-control" name="Col_name"  placeholder="Enter Your College Name">-->
              </div>
                <div class="input-group">

                <span class="input-group-addon">Picture</span>
                <input id="Col_img" type="file" class="form-control" name="Col_img" placeholder="Image of Your College">
              </div>
              
              <div class="input-group">
                <span class="input-group-addon">World Rank</span>
                <input id="Rank" type="number" class="form-control" name="Rank"  placeholder="Rank of Your College">
              </div>
          <input class="btn btn-light"  type="submit" class="form-control" value="Add" name="submit_rep" >
    
  </form>
<?php }else{

} ?>
        </div>
      </div>  
    </div>
			<h1>Added Student by You</h1>
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>NO.</th>
						<th>datetime</th>
						<th>Name</th>
						<th>Course</th>
						<th>email</th>
						<th>Image</th>
						<th>Select</th>
						<th>Details</th>
						<th>Action</th>
					</tr>
					<?php 
					
					 global $ConnectingDB;
                      $viewquery="SELECT * FROM portal WHERE publish_by='$getname' ORDER BY datetime desc ";
                     $execute=mysqli_query($Connection,$viewquery);
                       $srno=1;
             while ($dataRows=mysqli_fetch_array($execute)){
                 	$Id=$dataRows["id"];
                	$DateTime=$dataRows["datetime"];
                	$Name=$dataRows["name"];
                    $Age=$dataRows["age"];
                	$Course=$dataRows["course"];
                    $Contact=$dataRows["contact"];
                	$Image=$dataRows["image"];
                	$Skills=$dataRows["skills"];
                	$Post=$dataRows["post"];
             	  
					
            
    		 ?>
    		 <tr>
    		 	<td> <?php echo $srno; ?></td>
    		 	<td> <?php
                 if (strlen($DateTime)>11) {
    		 		$DateTime=substr($DateTime,0,11).'..';
    
    		 	}
    		 	 echo $DateTime; ?></td>
    		 	<td> <?php 
    		 	if (strlen($Name)>4) {
    		 		$Name=substr($Name,0,20).'..';
    
    		 	}
    		 	echo $Name;
    		 	 ?></td>
    		 	<td><?php
                if (strlen($Post)>6) {
    		 		$Post=substr($Post,0,6).'..';
    
    		 	}
    		 	echo $Post; ?></td>
    		 	<td> <?php 
    		 	if (strlen($Skills)>10) {
    		 		$Skills=substr($Skills,0,10).'..';
    
    		 	}
    		 	echo $Skills; ?></td>
    		 	<td> <img style="width: 100px;height: 100px;" src="upimg/<?php echo $Image ?>"></td>

    		<td><a href="select_stud.php?id=<?php echo $Id ;?>"><span class="btn btn-success">Select</span> </a>
                 <a href="unselect_stud.php?id=<?php  echo $Id ;?>"><span class="btn btn-danger">Unselect</span></a>
                </td>

    		 	
    		 	<td><a href="EditPost.php?Edit=<?php echo $Id ;?>"><span class="btn btn-success">Edit</span> </a>
                 <a href="deletePost.php?Delete=<?php  echo $Id ;?>"><span class="btn btn-danger">Delete</span></a>
    		 	</td>
    		 	<td><a href="describe.php?id=<?php echo $Id; ?>" target="_blank"> <span class="btn btn-primary">Live Preview</span></a></td>
    		 </tr>
 <?php   $srno++; }//end of the while loop ?>
					
				</table>
			</div>
			
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