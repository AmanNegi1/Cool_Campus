<?php 

require_once("include/session.php");
require_once("include/goodonedb.php");

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
	<title></title>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		
<?php include 'dash_left_bar.php';?>

		
		<div class="col-sm-10"><!--middle div-->
			<?php 
                 echo Message();
                 echo SuccessMessage();
				 ?>
			<h1>UN-Approved Comments</h1>
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>NO.</th>
						<th>Name</th>
						<th>datetime</th>
						
						<th>Comment</th>
						<th>Approve</th>
						<th>Delete Comment</th>

						<th>Details</th>
						
					</tr>
					<?php 
					
					 global $ConnectingDB;
                      $viewquery="SELECT * FROM comments WHERE status='OFF'";
                      $execute=mysqli_query($Connection,$viewquery);
                       $srno=1;
             while ($dataRows=mysqli_fetch_array($execute)) {
                 	$Id=$dataRows["id"];
                	$DateTime=$dataRows["datetime"];
                	$Name=$dataRows["name"];
                	$CommentName=$dataRows["comment"];
                 	$AdminId=$dataRows["adminportal_id"];
               
    		 ?>
                 <tr>
                 	<td><?php echo $srno; ?></td>
                 	<td><?php echo $Name; ?></td>
                 	<td><?php echo $DateTime; ?></td>
                    <td><?php echo $CommentName; ?></td>
                   <td><a href="approve.php?id=<?php echo $Id; ?>"><span class="btn btn-primary">Approve</span>
                    <td><a href="deleteComment.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span></a></td>
                    <td><a href="FullPost.php?id=<?php echo $AdminId; ?>"><span class="btn btn-info">Live Preview</span></a></td>
                 
                 </tr>
					<?php $srno++; }//end of the while loop ?>
				</table>
			</div>
			<h1>Approved Comments</h1>
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>NO.</th>
						<th>Name</th>
						<th>datetime</th>
						
						<th>Comment</th>
						<th>Approve</th>
						<th>Delete Comment</th>

						<th>Details</th>
						
					</tr>
					<?php 
					
					 global $ConnectingDB;
                      $viewquery="SELECT * FROM comments WHERE status ='ON'";
                      $execute=mysqli_query($Connection,$viewquery);
                       $srno=1;
             while ($dataRows=mysqli_fetch_array($execute)) {
                 	$Id=$dataRows["id"];
                	$DateTime=$dataRows["datetime"];
                	$Name=$dataRows["name"];
                	$CommentName=$dataRows["comment"];
                 	$AdminId=$dataRows["adminportal_id"];
               
    		 ?>
                 <tr>
                 	<td><?php echo $srno; ?></td>
                 	<td><?php echo $Name; ?></td>
                 	<td><?php echo $DateTime; ?></td>
                    <td><?php echo $CommentName; ?></td>
                    <td><a href="unapprove.php?id=<?php echo $Id; ?>"><span class="btn btn-primary">Unapprove</span></a></td>
                    <td><a href="deleteComment.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span></a></td>
                     <td><a href="describe.php?id=<?php echo $AdminId; ?>"><span class="btn btn-info">Live Preview</span></a></td>
                 
                 </tr>
					<?php $srno++; }//end of the while loop ?>
				</table>
			</div>

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