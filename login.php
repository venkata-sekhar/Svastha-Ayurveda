<?php
$conn =mysqli_connect("localhost","root","","RDX");
if($conn){
    echo "Connection established ... "."<br>";
}
else{
    echo "connection not established... "."<br>".mysqli_connect_error();
}

$email=$_POST['login-email'];
$password=$_POST['login-password'];
#using database:
$query2 = "use RDX";
if($conn->query($query2)){
	echo "Database RDX succesfully used..."."<br>";
}
else{
	echo "Database not used..."."<br>";
}
$query4 = "INSERT INTO login VALUES(?, ?);";
$initialize = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($initialize, $query4))
{
    mysqli_stmt_bind_param($initialize, "ss",$email,$password);
    mysqli_stmt_execute($initialize);
    echo "<h4 style='color:yellow'>Records Inserted</h4><br>"."<br>";
	
}

header("Location: home_1.html");
exit;
?>
