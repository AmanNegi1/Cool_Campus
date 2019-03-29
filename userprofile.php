<?php 
$getname=$_GET['name'];
require 'include/headsection.php';
?>
	 <?php include 'include/navheader.php'; ?></ul></div></div></nav>
       <form action="portal.php" class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" class="form-control " placeholder="Search" name="Search">
          </div>
          <button class="btn-btn-default" name="SearchButton">Go</button>
        </form>
     </div><!-- /.navbar-collapse -->
</nav>
<div  class="container">
    <div class="row">
  <?php
        $username2;
        $Name_Array = explode(" ", $getname);
        if ($Name_Array[0]=="guru") {
          $query="SELECT * FROM teacherregister WHERE username='$getname'";
        }else
         $query="SELECT * FROM studentregister WHERE username='$getname'";
         $execute=mysqli_query($Connection,$query);
         while ($datarows=mysqli_fetch_array($execute))
         {
         $username1=$datarows['username'];
         $username2=$datarows['username'];
   ?>
    
        <div class="col-sm-2 col-md-2">
          <div class="well" >
            <img src="<?php echo $datarows['profile'] ;?>"
            alt="" class="img-rounded img-responsive" >
            <form action="uploadimg.php?name=<?php echo $userLoggedIn; ?>" method="post">
            <input type="file" name="Upload_Img" title="&nbsp;" style="color:transparent; min-width:100px;" accept="image/x-png,image/gif,image/jpeg"/>
            <input type="submit" name="Submit_profile">
            </form>
          </div>
           <h3><cite title="Source Title"><?php echo $datarows['firstname'].' '. $datarows['lastname']; ?></cite></h3>
          </div>
            <div class="col-sm-4">
                <br/> 
              
           <?php 
         

           if (strlen($userLoggedIn)==strlen($username1)) {
            
             ?>
             <blockquote>
                     <?php }  ?> 
            </blockquote>
              <blockquote>
             <!--<a href="Messages.php?messId=<?php echo $username1; ?>"><button type="button" class="btn btn-light">Messages</button></a>-->
             </blockquote>
             <?php   if ($Name_Array[0]=="guru") { ?>
              <blockquote>
             <a href="Dashboard.php?messId=<?php echo $username1; ?>"><button type="button" class="btn btn-light">Dashboard</button></a>
             </blockquote>
             
             <?php } ?>
            </div>

   <?php
 $Name_Array = explode(" ", $getname);
        if ($Name_Array[0]=="guru") {
         include 'user_form_detail.php';         
        }
       ?>
      <?php  }//end of while ?>

     
     
 </div>
</div>

</body>
</html>