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
<div class="container">
   <div class="jumbotron">
   	<form action="all_colleges.php" class="navbar-form ">
        <center><div class="form-group">
            <input type="text" class="form-control"placeholder="Enter college name looking for" name="Search">
          </div><br>
          <button class="btn btn-primary" name="SearchButton">Search</button>
        </center>
        </form>
   </div>
   <div class="row">
   <?php 
         if (isset($_GET["SearchButton"])) {
         $Search=$_GET["Search"];
         $viewquery="SELECT * FROM colleges  WHERE name LIKE '%$Search%' ";
              }else{ 
			$viewquery="SELECT * from colleges";
            }
       $execute=mysqli_query($Connection,$viewquery);
       if (!$execute) 
         {
         printf("Error: %s\n", mysqli_error($Connection));
         exit();
         }
        // $count=0;
       while($dataRows=mysqli_fetch_array($execute)) {
             $Id=$dataRows["col_id"];
             $Col_name=$dataRows["name"];
             $Image=$dataRows["image"];
             $W_R=$dataRows["world_rank"];
			?>
           <div class="col-sm-2">

          <div  style="height: 5cm;background-color: #">
            <a href="top_student.php?col_id=<?php echo($Col_name); ?>">
           <img class="img-responsive"  src="upimg/<?php echo htmlentities($Image); ?>" style="height:3cm; overflow: hidden;position: relative;border-radius: 5px">
           <label class="text-justify">College:<?php echo ucwords($Col_name); ?></label>
           </a>
          </div>
        </div>
        <div class="col-sm-2">
          <div  style="height: 5cm;background-color: #">
          	<!--<span class="h4" style=" font-family:Lucida Console", Monaco, monospace;" >College:</span><span style="font-family: Courier New", Courier, monospace;" class="h4"><?php echo htmlentities($Col_name); ?></span>-->
            <p>World Rank:<?php echo htmlentities($W_R); ?></p>
            
          
          </div>
        </div>		<?php  } ?>
</div>
</div>
 <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>