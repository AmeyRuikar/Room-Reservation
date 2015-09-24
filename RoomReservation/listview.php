<?php


$server	=	"localhost";
$user	=	"root";
$password	=	"root";
$db	=	"mysql";

$conn = mysqli_connect($server, $user, $password, $db);


class reserve{

	public $reservationId;
	public $roomId;
	public $roomName;
	public $startTime;

}

$ps = array();


if($conn){

	$sel = "use mysql;";
	
	if( mysqli_query($conn, $sel)){//success
	
		$q = "select r.reservationId, r.roomId, r.startTime, t.roomName from reservations r inner join room t on r.roomId = t.roomId;";
		
		if( $res = mysqli_query($conn, $q)){//select q
		
			while($row = mysqli_fetch_assoc($res)){
					
					$single = new reserve;
					$single->reservationId = $row['reservationId'];
					$single->roomId = $row['roomId'];
					$single->startTime = $row['startTime'];
					$single->roomName = $row['roomName'];
					
					array_push($ps, $single);
			
			}
			
			echo json_encode($ps, true);
				
				
		}
		else{//fails
		
				echo mysqli_error()."<br>";
		
		}
	
	
	
	}
	else{//error
	
		echo mysqli_error()."<br>";
	
	}

}
else{

	echo "problem at server end";

}


?>