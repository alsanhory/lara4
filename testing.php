<?php
$con=mysqli_connect("localhost","root","","school2");
$sql="select * from students where id=1";
$query=mysqli_query($con,$sql);
$result=mysqli_fetch_array($query);
echo $result['name'];
?>