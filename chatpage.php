<?php 
/*if (isset($_POST['Submit'])) {
    $notice=mysqli_real_escape_string($Connection,$_POST["notice_from_both"]);

     if(empty($notice)){
       echo "Please fill the Notice"; 
      }
      date_default_timezone_set("Asia/kolkata");
     $currenttime1=time();
     $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
     $datetime;
                 $Name_Array = explode(" ", $userLoggedIn);
                  if ($Name_Array[0]=="guru") {
                  $fatch_query="SELECT collegename FROM teacherregister WHERE username='$userLoggedIn' ";
                
                   }
                   else{
                   $fatch_query="SELECT collegename FROM studentregister WHERE username='$userLoggedIn' ";
                
                 }
                
                 $execute=mysqli_query($Connection,$fatch_query);
                 $info = mysqli_fetch_array($execute);
                  if ($Name_Array[0]=="guru") {
                 $insert_query = "INSERT INTO notice_board (added_by,college_name,notice,date_time,status) VALUES ('$userLoggedIn','$info[collegename]','$notice','$datetime',0)";
             }else{
                 $insert_query = "INSERT INTO notice_board (added_by,college_name,notice,date_time,status) VALUES ('$userLoggedIn','$info[collegename]','$notice','$datetime',1)";
             }
         if (mysqli_query($Connection, $insert_query)) {
    echo "<div class='container well '>successful</div>";
} else {
    echo "Error: " . $insert_query . "<br>" . mysqli_error($Connection);
}


   }
*/
 ?>

 <?php if (isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($Connection, "SELECT * FROM studentregister WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
      }
else  {
      header("Location: landing.php");
      }
?>

 <div class="panel panel-primary">
                
                <div class="panel-body" >
                    <ul class="chat">
                        <?php
                                      $Name_Array = explode(" ", $userLoggedIn);
                                     if ($Name_Array[0]=="guru") {
                                        $fatch_query="SELECT collegename FROM teacherregister WHERE username='$userLoggedIn' ";
                                        $execute=mysqli_query($Connection,$fatch_query);
                                        $row_info = mysqli_fetch_array($execute);

                                    }
                                    else{
                                        $fatch_query="SELECT collegename FROM studentregister WHERE username='$userLoggedIn' ";
                                         $execute=mysqli_query($Connection,$fatch_query);
                                        $row_info = mysqli_fetch_array($execute);

                                     }
                                      $query="SELECT * from notice_board WHERE college_name='$row_info[collegename]' and status=0";
                                      $execute=mysqli_query($Connection,$query);  
                                      while($dataRows=mysqli_fetch_array($execute)) {
                                         
                                       ?>

                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img style="width: 2cm;height: 2cm;" src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $dataRows['added_by']; ?></strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php echo $dataRows['date_time']; ?> ago</small>
                                </div>
                                <p>
                                   <?php echo $dataRows['notice'];?>
                                   
                                </p>
                            </div>
                        </li><?php }//end of while loop ?>
                        <?php 
                                    $Name_Array = explode(" ", $userLoggedIn);
                                     if ($Name_Array[0]=="guru") {
                                        $fatch_query="SELECT collegename FROM teacherregister WHERE username='$userLoggedIn'  ";
                                        $execute=mysqli_query($Connection,$fatch_query);
                                        $row_info = mysqli_fetch_array($execute);

                                    }
                                    else{
                                        $fatch_query="SELECT collegename FROM studentregister WHERE username='$userLoggedIn'";
                                         $execute=mysqli_query($Connection,$fatch_query);
                                         $row_info = mysqli_fetch_array($execute);

                                     }
                                      $query="SELECT * from notice_board WHERE college_name='$row_info[collegename]' and status=1";
                                      $execute=mysqli_query($Connection,$query);  
                                      while($dataRows=mysqli_fetch_array($execute)) {
                                         
                                       ?>

                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img style="width: 2cm;height: 2cm;" src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $dataRows['date_time']; ?></small>
                                    <strong class="pull-right primary-font"><?php echo $dataRows['added_by']; ?></strong>
                                </div>
                                <p>
                                    <?php  echo $dataRows['notice']; ?>
                                </p>
                            </div>
                        </li>
                        <?php } //end of while loop ?>
                    </ul>
                </div>
                <form name="TestForm" action="include/chatpage_php.php" method="POST">
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="notice_from_both" type="text" name="notice_from_both" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                             <input class="btn btn-primary" type="button"  onclick="postData()" >
                        </span>
                    </div>
                </div>
            </form>
            <div id="output1"></div>
            <div id="status">Status</div>

            <script>
    var btn_input = document.getElementById('output1');
    var astatus = document.getElementById('status');
    function postData() {
        var notice_from_both = document.getElementById('notice_from_both').value;
        console.log(notice_from_both);
        var vars = "notice_from_both=" + notice_from_both ;
        console.log(vars);
        var hr = new XMLHttpRequest();
        var url = "include/chatpage_php.php";
        console.log(hr);
          hr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var newData = JSON.stringify(hr.responseText)
                var myObj = JSON.parse(newData);
                console.log(hr.responseText);
            }
        }
               hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         hr.send(vars);
        astatus.innerHTML = "processing ... ";
    }
</script>            </div>
