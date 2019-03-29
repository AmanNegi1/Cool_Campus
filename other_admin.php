<?php include 'include/headsection.php'; ?>
<?php require_once("include/navheader.php"); 
//$getname=$_GET['messId'];
?>  

  </ul></div></div></nav>
<div class="container-fluid">
  <div class="row">
    
<?php include 'dash_left_bar.php'; ?>
  
    <div class="col-sm-10"><!--middle div-->
    <div class="row">
    <?php
    $user_col=$user['collegename'];
    $viewquery="SELECT * FROM teacherregister where collegename='$user_col' ORDER BY date desc";
    $execute=mysqli_query($Connection,$viewquery);
    if (!$execute) {
    printf("Error: %s\n", mysqli_error($Connection));
    exit();
    }
    while($dataRows=mysqli_fetch_array($execute)) {
    $Id=$dataRows["teachid"];?>
     <div class="col-sm-3">
     <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo($dataRows['profile']); ?>" style="width: 5cm" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">CollegeName:<?php echo($dataRows['collegename']); ?></h5>
    <p class="card-text">Skills: <?php echo($dataRows['skills']) ?></p>
    <ul class="list-group list-group-flush">
    <li class="list-group-item">Name:<?php echo($dataRows['username']); ?></li>
    
  </ul>
    <div class="card-body">
    <a href="added_student.php?teachid=<?php echo($dataRows['username']); ?>" class="card-link">Added Student</a>
   
  </div>
  </div>
  </div>
</div><?php } ?>
      

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