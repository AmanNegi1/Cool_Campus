		<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
            <span class="sr-only"> Toggle nav</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
		<div class="col-sm-2 " id="collapse"><!--side div -->

		<h4>&nbsp;&nbsp;Faculty Dashboard</h4>
		<ul id="sidebar" class="nav nav-pills nav-stacked nav-hover">
		<li ><a href="Dashboard.php?messId=<?php echo $user['username']; ?>">
         <span class="glyphicon glyphicon-th"></span>
		 &nbsp;&nbsp;Dashboard</a></li>
		
		<li><a href="addnewpost.php">
		 <span class="glyphicon glyphicon-list-alt"></span>
		 &nbsp;&nbsp;Add new Student</a></li>
		<li><a href="notice.php">
		 <span class="glyphicon glyphicon-user"></span>
		 &nbsp;&nbsp;Add a notice</a></li>
		<!--<li><a href="comments.php">
		 <span class="glyphicon glyphicon-comment"></span>
		 &nbsp;&nbsp;Commments
         <span class="label  label-danger"><?php // echo $totaldAppr; ?></span>
		</a></li>-->
		<li><a href="other_admin.php">
		 <span class="glyphicon glyphicon-comment"></span>
		 &nbsp;&nbsp;Other Admin 
         <span class="label  label-danger"><?php // echo $totaldAppr; ?></span>
		</a></li>
		<li><a href="#">
		 <span class="glyphicon glyphicon-equalizer"></span>
		 &nbsp;&nbsp;Higher Selected</a></li>
		<li><a href="registerevent.php">
		 <span class="glyphicon glyphicon-equalizer"></span>
		 &nbsp;&nbsp;Add Event</a></li>
		<li><a href="#">
		 <span class="glyphicon glyphicon-log-out"></span>
		 &nbsp;&nbsp;Logout</a></li>
		</ul>

		</div><!--end of the  side div-->
		