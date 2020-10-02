<!DOCTYPE html>
<html>
<head>
	<title>Passenger Info</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
	.error{
		color: red;
	}
	#btn{
		text-align: center;
	}
	input[type='submit']{
		width: 30%;
	}
</style>
<body>
	<div class="container">
		
		<div class="jumbotron">
			<h1>Passenger Info</h1>
			<form method="POST" action="reserve.php">
				<div class="form-group">
					<label for="name">Booked By</label>
					<input class="form-control" type="text" name="name" placeholder="Name" id="name" required>
				</div>
				<div class="form-group">
					<label for="mobilenumber">Mobile Number</label>
										<div class="input-group">
      

      <div class="input-group-btn">
        <button class="btn btn-default" disabled>+91</i></button>
      </div><input class="form-control" type="tel" maxlength="10" pattern="[0-9]{10}" name="mobilenumber" id="mobilenumber" required>
    </div>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<textarea rows="3" class="form-control" name="address" id="address" required></textarea>
				</div>
				<div class="jumbotron">
				<?php
				session_start();
				$len=(int)$_SESSION["passenger-count"];
					for($i=1;$i<=$len;$i++){
					if((int)$_SESSION['seats']>0){
						$seatno="Seat no:".((int)$_SESSION['seats']-$i+1);
					}
					else{
						$seatno="waiting...";
					}
						echo "
						<div class='form-group'>
							<br><br><div>
							<label>Passenger $i</label>
						</div>
							<div class='form-group col-xs-3'>
								<input class='form-control' type='text' name='passenger-name$i' placeholder='name' required>
							</div>
							<div class='form-group col-xs-3'>
								<input class='form-control' type='number' name='passenger-age$i' min='1' max='200' placeholder='age' required>
							</div>
							<div class='form-group col-xs-3'>
								<select class='form-control' type='text' name='passenger-gender$i' required>
									<option>Male</option>
									<option>Female</option>
									<option>Transgender</option>
								</select>
							</div>
							<div class='form-group col-xs-3'>
								<input class='form-control' value='$seatno' disabled>
							</div>

						</div>";
					}
				?>
				</div>
				<div id="btn" >
					<input class="btn btn-success" type="submit" name="submit" value="Proceed">
				</div>
				<div class="helper-text">
					<span class="error" id="error"></span>
				</div>
			</form>
			
		</div>
	</div>
	
</body>
<script type="text/javascript">
	function go() {
		//alert("came");
		var l=document.getElementById('location');
		var d=document.getElementById('destination');
		var date=document.getElementById('depart-date');
		var c=document.getElementById('class');
		if (isEmpty(l.value)||isEmpty(d.value)||isEmpty(date.value)||isEmpty(c.value)) {
			document.getElementById('error').innerHTML="All details required!";
			return false;
		}
		else{
			document.getElementById('error').innerHTML="";
			return true;
		}
	}
	function isEmpty(a){
		//a=a.replace(' ','');
		return a===''||a===null||a===undefined;
	}

</script>
</html>