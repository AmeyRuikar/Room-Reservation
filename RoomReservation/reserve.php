<!DOCTYPE html>
<html lang="en">
<head>INsert<head>
<body>
<?php


$email = $_POST['email'];
$name = $_POST['fname'];
$roomid = intval($_POST['room']);
$purpose = $_POST['purpose'];

$server	=	"localhost";
$user	=	"root";
$password	=	"root";
$db	=	"mysql";

$conn = mysqli_connect($server, $user, $password, $db);


if($conn){

	$sel = "use mysql;";
	
	if( mysqli_query($conn, $sel)){//success
	
		$stmt = mysqli_stmt_prepare("insert into reservations (id, reservationId, firstName, email, roomId, purspose) values (12,112,?, ?, ?,?)");
		
		mysqli_stmt_bind_param($stmt,"ssis",fname,email,roomid, purpose);
		
		if( $res = mysqli_stmt_execute($stmt)){//select q
		
			
			echo "reserved";
				
				
		}
		else{//fails due to clash
		
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

</body>