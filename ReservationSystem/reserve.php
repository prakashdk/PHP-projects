<?php
	session_start();
	if(isset($_POST['submit'])){
		$con=new mysqli("localhost","root","","onlineticket");
		if ($con) {
			$q="SELECT bookid FROM bookingtable";
			$result=$con->query($q);
			//print_r($result);
			$query="INSERT INTO bookingtable VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt=$con->prepare($query);
			$stmt->bind_param("isssssssssssssssss",$bookid,$pnr,$name,$age,$gender,$bookedby,$contact,$address,$trainname,$trainno,$from,$to,$date,$departuretime,$arrivaltime,$class,$seatno,$status);
			//$stmt->bind_param("siss",$bookid,$pnr,$name,$age);
			$count=(int)$_SESSION["passenger-count"];

			$rows=array();

			if (mysqli_num_rows($result)>0) {
				while ($row=$result->fetch_assoc()) {
					if (!in_array($row["bookid"],$rows)) {
						array_push($rows,$row["bookid"]);
					}
				}
			}
			
			$tempId=getBookId($rows);
			$pnr=$tempId;
				$bookid=0;
				$bookedby=$_POST["name"];
				$contact=$_POST["mobilenumber"];
				$address=$_POST["address"];
				$trainname=$_SESSION["train-name"];
				$trainno=$_SESSION["train-no"];
				$from=$_SESSION["trainfrom"];
				$to=$_SESSION["trainto"];
				$date=$_SESSION["depart-date"];
				$departuretime=$_SESSION["departure"];
				$arrivaltime=$_SESSION["arrival"];
				$class=$_SESSION["coach"];
				$status=$_SESSION["status"];
				//echo $status;

			for ($i=1; $i<=$count ; $i++) { 
				
				
				$name=$_POST["passenger-name$i"];
				$age=$_POST["passenger-age$i"];
				$gender=$_POST["passenger-gender$i"];
				if ($_SESSION["seats"]!="0") {
					$seatno=(int)$_SESSION["seats"]-$i+1;
				}
				else{
					$seatno="0";
				}
				//echo $seatno."<br>";
				//$a=array($bookid,$pnr,$name,$age,$gender,$bookedby,$contact,$address ,$trainname,$trainno,$from,$to,$date,$departuretime,$arrivaltime,$class,$status);
				//print_r($a);
				//echo "<br>";
				$stmt->execute();
			}


		}
		header("Location:success.php");

	}
	else{
		echo "Failed <a href='./booking.html'>Retry</a>";
	}

	function getBookId($list){
		$id=rand(1000000000,9999999999);
		//print_r($list);
		
		if (in_array($id,$list)) {
			getBookId($list);
		}
		return $id;
	}
?>