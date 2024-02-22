<!-- database connectivity -->
<?php
$connect = mysqli_connect("localhost", "root", "", "voting") or die("connection failed");
if($connect){
    echo "Connected successfuly!";
}else{
    echo "Not Connected!";
}
?>