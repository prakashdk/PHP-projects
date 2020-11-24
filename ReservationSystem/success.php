<!DOCTYPE html>
<html>
<head>
	<title>Success</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style type="text/css">
	.field{
		text-align: center;
  		margin: 0;
  		position: absolute;
  		top: 30%;
  		left: 50%;
  		-ms-transform: translate(-50%, -30%);
  		transform: translate(-50%, -30%);
	}
</style>
<body>

	<div class="container">
		<div class="field">
			
			<?php
			session_start();
			$_SESSION["completed"]="undone";
			if(isset($_SESSION["status"])){



				$status=$_SESSION["status"];
				if($status=="1"){
					$_SESSION["completed"]="done";
					echo "<i class='fa fa-check-circle' style='font-size:150px;color:green'></i><h1>Your Ticket Booking has Confirmed</h1>";
				}
				else{
					echo "<i class='fa fa-warning' style='font-size:150px;color:orange'></i><h1>Your Ticket Booking is in Waiting List</h1>";
				}
			}
			else{
				echo "<i class='fa fa-warning' style='font-size:150px;color:red'></i><h1>Your Ticket Booking is failed</h1>";
			}
			?>
			<a class="btn btn-default" href="index.php">Go Home</a>
		</div>
		
	</div>

</body>
</html>