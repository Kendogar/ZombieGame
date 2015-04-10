<?php

use Zombies\GameBundle\Utils;

$id = $_REQUEST['placeId'];

$con=mysqli_connect("localhost","root","","zombies");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="SELECT type FROM places WHERE id = ".strval($id);
$result=mysqli_query($con,$sql);

// Fetch all
$type = mysqli_fetch_all($result,MYSQLI_ASSOC);

// Free result set
mysqli_free_result($result);

mysqli_close($con);

echo json_encode($type);