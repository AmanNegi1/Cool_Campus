<?php
//require_once("include/goodonedb.php");
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
<!--<div class="row">
       <div class="col-sm-offset-1 col-sm-3">
         <a href="addnewpost.php" class="btn btn-primary">Add Student</a>
       </div>
       <div class="col-sm-offset-1 col-sm-3">
         <a href="notice.php" class="btn btn-success">Add Notice</a>
       </div>
       <div class="col-sm-offset-1 col-sm-3">
         <a href="dashboard.php" class="btn btn-info">Dashboard</a>
       </div>
     </div>-->
    <br><br>
<?php 
    
     $query = mysqli_query($Connection, "SELECT collegename FROM studentregister WHERE username='$userLoggedIn' ");
        $dataRows = mysqli_fetch_array($query);
 ?>
<div class="container">
     
   <div style="background-color: #61fc46;" class="jumbotron" id="jumbo">
      
      <center><h1 style="color: white;">Welcome</h1></center>
      

    </div>
   <span style="color:#775959;font-family: Courier New", Courier, monospace;" class="h2">Events</span>	
  <div class="row">
  	<?php
  	           
               global $ConnectingDB;
               if (isset($_GET["SearchButton"])) {
              	   $Search=$_GET["Search"];
              	   $viewquery="SELECT * FROM currentevent WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR catagory LIKE '%$Search%' OR post LIKE '%$Search%' ";
                  }
              else{
                $user_col=$user['collegename'];
                 $viewquery="SELECT * FROM currentevent WHERE collegename='$user_col' ORDER BY datetime desc";
                 }
                $count=0;
                $execute=mysqli_query($Connection,$viewquery);
              while($dataRows=mysqli_fetch_array($execute)) {
             
             	$Id=$dataRows["id"];
             	$DateTime=$dataRows["datetime"];
             	$HOSTNAME=$dataRows["hostname"];
             	$CONTACT=$dataRows["contact"];
             	$EVENTNAME=$dataRows["eventname"];
             	$IMAGE=$dataRows["image"];
             	$GOOGLEFORM=$dataRows["googleform"];
                $INFO=$dataRows["info"];
                if ($count==3) 
                '<br>'
                
             ?>

        <div class="col-sm-2">

          <div  style="height: 5cm;background-color: #">
         
           <img class="img-responsive"  src="upimg/<?php echo htmlentities($IMAGE); ?>" style="height:3cm; overflow: hidden;position: relative;border-radius: 5px">
           <label class="text-justify">Event Name: <?php echo ucwords($EVENTNAME); ?></label>

          </div>
        </div>
        <div class="col-sm-4">
          <div  style="height: 5cm;background-color: #">
          	<span class="h4" style=" font-family:Lucida Console", Monaco, monospace;" >Hosted by:</span><span style="font-family: Courier New", Courier, monospace;" class="h4"><?php echo htmlentities(strtoupper($HOSTNAME)); ?></span>
            <p><?php echo htmlentities($INFO); ?></p>
            <br>
            <br>
            <br>
            <span><a href="<?php echo htmlentities($GOOGLEFORM);?>">REGISTER NOW</a></span>
          </div>
        </div>
           <?php $count++;   }//end of the while lloop ?> 
<a href="example.php?readmore=<?php  ?>"><span  class="btn btn-primary" style="float: right;">More</span>
      </a>    
      </div><!--end of row class--><br>
          
      <DIV class="row">
       <div style="float: left;" class="col-sm-6">
         <div  style="overflow: hidden;background-color: #">
           <span style="color:#775959;font-family: Courier New", Courier, monospace;" class="h3">&nbsp;Notice from college</span>
            <?php  include 'chatpage.php';  ?>    
        </div>
       </div>
       <div class="col-sm-6 " class="font_ch" style="background-color: #">
        Lets see the Brillentancy of the students
         <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="hovereffect">
               <img class="img-responsive" src="img/iaagi.jpg" alt="">
               <div class="overlay">
                <h2>Effect 13</h2>
                <p>
                  <a href="#">LINK HERE</a>
                </p>
              </div>
           </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="hovereffect">
               <img class="img-responsive" src="img/iaagi.jpg" alt="">
               <div class="overlay">
                <h2>Effect 13</h2>
                <p>
                  <a href="#">LINK HERE</a>
                </p>
              </div>
           </div>
          </div>

        
         </div><!--end of 1st row-->
        <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="hovereffect">
               <img class="img-responsive" src="img/iaagi.jpg" alt="">
               <div class="overlay">
                <h2>Effect 13</h2>
                <p>
                  <a href="#">LINK HERE</a>
                </p>
              </div>
           </div>
          </div>         
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
             <div class="hovereffect">
               <img class="img-responsive" src="img/iaagi.jpg" alt="">
               <div class="overlay">
                <h2>Effect 13</h2>
                <p>
                  <a href="#">LINK HERE</a>
                </p>
              </div>
           </div>
          </div>
           </div>
         </div><!--end of 2st row-->

</DIV>

  
  <div class="container row">
  	&nbsp;&nbsp;&nbsp;<h3 ><span  style="border-radius: 5px;color: #f9688d;"><span style="color:#775959;font-family: Courier New", Courier, monospace;padding: 5px ">Top One</span></span></h3>
  	<?php
  	           
               global $ConnectingDB;
               if (isset($_GET["SearchButton"])) {
              	   $Search=$_GET["Search"];
              	   $viewquery="SELECT * FROM portal WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR catagory LIKE '%$Search%' OR post LIKE '%$Search%' ";
                  }
              else{
             //   $user_coll=$user['collegename'];
                 $viewquery="SELECT * FROM portal where college='$user_col' ORDER BY datetime desc";
                 }
                $count=0;
                $execute=mysqli_query($Connection,$viewquery);
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
                if ($count==4) {
                	break;
                }
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
    	</a>
    </div>
  <?php    
     	 $count++;
   }//end of the while loop
   ?>
   <?php $readmore=1; ?>
     <br>
    <a href="describefull.php?readmore=<?php echo $readmore; ?>"><span  class="btn btn-primary" style="float: right;">More</span>
    	</a>    
    </div><!--end of the row-->




  </div>
  <br>
</div>
    <div class="jumbotron">
    	
    	<center><h3>Hello We think that You feel happy</h3></center>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
</body>
</html>
