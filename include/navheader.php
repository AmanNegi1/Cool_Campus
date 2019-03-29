<?php
require 'goodonedb.php';

if (isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        $Name_Array = explode(" ", $userLoggedIn);
        if ($Name_Array[0]=="guru") {
        $user_details_query = mysqli_query($Connection, "SELECT * FROM teacherregister WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
        $user_id=$user['teachid'];
        }else{
        $user_details_query = mysqli_query($Connection, "SELECT * FROM studentregister WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
        $user_id=$user['id'];
        }
        
        
      }
else  {
      header("Location: landing.php");
      }
?>
 
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
  .giveFont{
     font-family: "Comic Sans MS", cursive, sans-serif;
     font-size: 0.5cm;
  }
</style>
 <script src="https://widget.ccichat.com/ccichat_client?id=CCIfvyf8Ht51U4lQfojimIlNu" id="CCILive"></script>
</head>
<body>
<nav style="background-color: #BD426C" class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only"> Toggle nav</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="portal.php">
          <img src="img/dawn.jpg" style="width: 160px;height: 60px;margin-top: -20px">
          </a>
        </div>
        <div class="collapse navbar-collapse" id="collapse" >
        <?php 
        $Name_Array = explode(" ", $userLoggedIn);
        if ($Name_Array[0]=="guru") {
        
        ?>  
        <ul class="nav navbar-nav">
         <li><a class="giveFont" style="color: #FAFCF5" href="dashboard.php?messId=<?php echo $userLoggedIn; ?>">Dashboard</a></li>
        </ul><?php } ?>
        <ul class="nav navbar-nav">
         <li><a class="giveFont" style="color: #FAFCF5" href="all_colleges.php?id=<?php echo($user_id); ?>">All Colleges</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="giveFont" style="color: #FAFCF5;" href="userprofile.php?name=<?php echo $userLoggedIn ?>"><?php  echo $userLoggedIn; ?></a></li>
            <li><a href="#"></a></li>
           <li class="dropdown">
            <a href="#" style="color: #FAFCF5" class="dropdown-toggle" data-toggle="dropdown"><i class="far fa-user"></i></a>
            <ul class="dropdown-menu">
          
                <li><a class="giveFont" style="color: #FAFCF5;background-color:#BD426C " href="include\login\logout.php">SignOut</a></li>
                <?php  //   }
                //  else{
                 ?>
                <!-- <li><a href="register.php">SignIn</a></li> -->   <?php //}?>
            
        </ul>
      </li>
 