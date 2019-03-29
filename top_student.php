<?php
require_once("include/headsection.php");
//require_once("include/login/logout.php");
//require_once("include/functions.php");
 ?> 
 <?php 
 $Connection=mysqli_connect('localhost','root','');
 $ConnectingDB=mysqli_select_db($Connection,"goodone");
 
  ?>
<?php require_once("include/navheader.php") ?>
</ul></div></div></nav>
<br><br>	
<div class="container">
   <div class="jumbotron">
   	<form action="top_student.php" class="navbar-form ">
        <center><div class="form-group">
            <input type="text" class="form-control"placeholder="Skills,Projects,Programmer" name="Search">
          </div><br>
          <button class="btn btn-primary" name="SearchButton">Search</button>
        </center>
        </form>
   </div>
   <div class="row">
   <?php 
         if (isset($_GET["SearchButton"])) {
         $Search=$_GET["Search"];
     $viewquery="SELECT skills FROM portal WHERE  skills LIKE '%$Search%' ";
              }else{ 
			$get_col_id=$_GET['col_id'];

      $check_database_query = mysqli_query($Connection, "SELECT * from portal WHERE college = '$get_col_id'");
       $check_login_query = mysqli_num_rows($check_database_query);

        if($check_login_query >= 1) {
           $viewquery="SELECT * from portal WHERE college='$get_col_id' or college = '$get_col_id'";
            
       $execute=mysqli_query($Connection,$viewquery);
       if (!$execute) 
         {
         printf("Error: %s\n", mysqli_error($Connection));
         exit();
         }
        // $count=0;
       while($dataRows=mysqli_fetch_array($execute)) {
        $Id=$dataRows["id"];
              $DateTime=$dataRows["datetime"];
              $Name=$dataRows["name"];
              $Age=$dataRows["age"];
              $Skills=$dataRows["skills"];
              $Course=$dataRows["course"];
              $Image=$dataRows["image"];
              $Post=$dataRows["post"];
              $Publish_by=$dataRows["publish_by"];
        ?>
        <div class="col-sm-3" style="background-color:;">
    <div class="hovereffect">
       <img class="img-responsive" class="img-fluid img-thumbnail" src="upimg/<?php echo htmlentities($Image); ?>" style="height:5.5cm; overflow: hidden;position: relative;border-radius: 5px">
        <div class="overlay">
            <br><center>
           <span class="h3" style="color:#efdede;font-family: Courier New", Courier, monospace;"><?php echo htmlentities(strtoupper($Name));?></span><br>
            <span style="font-family: Courier New", Courier, monospace;"><h2><?php echo htmlentities($Skills); ?></h2></span></center>
         </div>
     </div>
         
      <br><center>
         <label style="background-color: #61fc46">Name&nbsp;:&nbsp;<?php echo htmlentities($Name); ?></label><br>
         <label>Skills&nbsp;:&nbsp;<?php echo htmlentities($Skills); ?></label>
         <label style="background-color: #61fc46">Publish By&nbsp;:&nbsp;<?php echo htmlentities($Publish_by); ?></label>
       </center><br>
         <a href="resume/describe.php?id=<?php echo $Id; ?>"><center><span class="form-control"  class="btn btn-info btn-sm"><span style="background-color: #ef6039;color: white">Read More</span></span></center>
      </a><br><br>
    </div>
        <?php
   }
   }else{?>
    <div class="jumbotron">
      <center>No Record Find Yet</center>
    </div>
    <?php

   }}?>
</div>
</div>