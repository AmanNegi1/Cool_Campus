<?php 

 include '../include/sessdb.php';
$urlId=$_GET["id"];

include 'message.php';
 ?>
<?php // include '../include/sessdb.php';?>
<!DOCTYPE html>
<html lang="en">

  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">
     <script src="https://widget.ccichat.com/ccichat_client?id=CCIfvyf8Ht51U4lQfojimIlNu" id="CCILive"></script>
  </head>
  <div class="jumbotron"> 
    <h3>Its Motivates You</h3>
  </div>
  <body id="page-top">
    <?php $urlId=$_GET["id"];
                $viewquery="SELECT * FROM portal WHERE Id='$urlId' ORDER BY datetime desc";
                $execute=mysqli_query($Connection,$viewquery);
                $dataRows=mysqli_fetch_array($execute)?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">welcome</span>
        <span class="d-none d-lg-block">
          <?php if ($dataRows['image']!=" ") {
           ?>
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="/upload/<?php echo $dataRows['image']; ?>" alt="">
           <?php }else{
                  
            ?>
            <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="/upimg/avatar.jpg" alt="">
          <?php } ?>
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
         
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
          </li>
         
          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#comments">Comments</a>
          </li>

           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../portal.php">Back to page</a>
          </li>

        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">
  <?php   if (isset($_GET["SearchButton"])) {
                $Search=$_GET["Search"];
                $viewquery="SELECT * FROM portal WHERE datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR catagory LIKE '%$Search%' OR post LIKE '%$Search%' ";
              }
              else{
                   $urlId=$_GET["id"];
                $viewquery="SELECT * FROM portal WHERE Id='$urlId' ORDER BY datetime desc";
                }
               
                $execute=mysqli_query($Connection,$viewquery);
             $dataRows=mysqli_fetch_array($execute);
              $Id=$dataRows["id"];
                $DateTime=$dataRows["datetime"];
                $Name=$dataRows["name"];
                $Age=$dataRows["age"];
                $Contact=$dataRows["contact"];
                $Skills=$dataRows["skills"];
                $Course=$dataRows["course"];
                $Image=$dataRows["image"];
                $Post=$dataRows["post"];
              

            
         ?>   
      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h3 class="mb-8"><?php echo $Name; ?>
            <span class="text-primary">Singh</span>
          </h3>
          <h3 class="mb-0">Course
            <span class="text-primary"><?php echo $Course; ?></span>
          </h3>
          <div class="subheading mb-5">3542 Berry Street · Cheyenne Wells, CO 80810 · (317) 585-8468 ·
            <a href="mailto:name@email.com">Mail Function is Comming</a>
          </div>
          <p class="mb-5"></p>
          <ul class="list-inline list-social-icons mb-0">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </section>

   
      
       <?php  $viewquery="SELECT * FROM portal WHERE Id='$urlId' ORDER BY datetime desc";
                $execute=mysqli_query($Connection,$viewquery);
                $dataRows=mysqli_fetch_array($execute)?>
      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
          <div class="subheading">Skills</div>

          <div class=""><?php echo $dataRows['skills']; ?></div>
         
          <div class="subheading mb-3">Workflow</div>
          <ul class="fa-ul mb-0">
            <li>
              <i class="fa-li fa fa-check"></i>
              Mobile-First, Responsive Design</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Cross Browser Testing &amp; Debugging</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Cross Functional Teams</li>
            <li>
              <i class="fa-li fa fa-check"></i>
              Agile Development &amp; Scrum</li>
          </ul>
        </div>
      </section>

      
      
       <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="comments">
        
          <div class="row">
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <form action="describe.php?id=<?php echo($urlId); ?>" method="post" class="from-control">
                  <textarea type="text" name="Text" placeholder="Enter Your Message here" style="width: 400px;"></textarea><br>
                  <input type="submit" class="btn btn-primary" style="float: left;" name="mess_submit">
                  </form>
                </div>
              </div>
            </div>
           
            <div class="col-sm-6">
              <div class="card">
                <div class="card-header">
                  Comments
                </div>
                <div class="card-body">
                   <?php 
                $viewquery="SELECT * FROM comments WHERE post_id='$urlId' ORDER BY datetime desc";
                $count=0;
                $execute=mysqli_query($Connection,$viewquery);
                 while($dataRows=mysqli_fetch_array($execute)) {
            ?>
                  <blockquote class="blockquote mb-0">
                    <p><?php echo $dataRows['comment'];
                     $com_id=$dataRows['user_id'];
                     ?></p>
                   <?php 
                    $query="SELECT username from teacherregister natural join comments ";
                      $execute1=mysqli_query($Connection,$query);
                      $dataRows1=mysqli_fetch_array($execute1);
                  ?>
                    <footer class="blockquote-footer">BY <cite title="Source Title"><?php  echo $dataRows1['username']; ?></cite></footer>
                   <?php } ?>
                </div>
              </div>
            </div>
         
          </div>
        
      </section>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
