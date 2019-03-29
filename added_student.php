<?php include 'include/headsection.php'; ?>
<?php require_once("include/navheader.php"); 
$get_id=$_GET['teachid'];
?>  

  </ul></div></div></nav>
<div class="container-fluid">
  <div class="row">
    
<?php include 'dash_left_bar.php'; ?>
  
    <div class="col-sm-10"><!--middle div-->
    <div class="row">
    <?php
    $user_col=$user['collegename'];
    $viewquery="SELECT * FROM portal where publish_by='$get_id' ORDER BY datetime desc";
    $execute=mysqli_query($Connection,$viewquery);
    if (!$execute) {
    printf("Error: %s\n", mysqli_error($Connection));
    exit();
    }
    while($dataRows=mysqli_fetch_array($execute)) {
    $Id=$dataRows["id"];?>
    
        <div class="col-sm-2">
          <div class="well">
           <p><?php echo($dataRows['name']); ?></p>
           <img src="upimg/<?php echo($dataRows['image']); ?>" class="img-responsive" style="height: 3cm;" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <div class="card border-info mb-3" style="max-width: 18rem;">
             <div class="card-header">Course<?php echo($dataRows['course']); ?></div>
              <div class="card-body text-info">
                <h5 class="card-title">Skills:<?php echo($dataRows['skills']); ?></h5>
                <p class="card-text">Contact <?php echo($dataRows['contact']); ?></p>
              </div>
            </div>
            <a href="resume/describe.php?id=<?php echo($Id); ?>">View More</a>
          </div>
        </div>
    
    <?php } ?>
      

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