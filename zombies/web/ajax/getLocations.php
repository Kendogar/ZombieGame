<?php

use Zombies\GameBundle\Entity\Place;
use Zombies\GameBundle\Utils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

$coordinatesArray = $_REQUEST['coordinatesArray'];

$largeY = $coordinatesArray[0];
$smallY = $coordinatesArray[1];
$largeX = $coordinatesArray[2];
$smallX = $coordinatesArray[3];

$con=mysqli_connect("localhost","root","","zombies");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql_prepare="SELECT place_id, x_coordinate, y_coordinate FROM coordinates WHERE y_coordinate BETWEEN ".strval($smallY)." AND ".strval($largeY)." AND x_coordinate BETWEEN ".strval($smallX)." AND ".strval($largeX);
$result_prepare = mysqli_query($con,$sql_prepare);

$watwat = mysqli_fetch_all($result_prepare,MYSQLI_NUM);

mysqli_free_result($result_prepare);

$sql="SELECT place_id, x_coordinate, y_coordinate FROM coordinates WHERE place_id IN (";
foreach($watwat as $result){
    if(strpos($sql,strval($result[0])) == false){
        $sql = $sql . strval($result[0]) . ",";
    }

}
$sql = $sql . "0) ORDER BY place_id";


$result=mysqli_query($con,$sql);

// Fetch all
$wat = mysqli_fetch_all($result,MYSQLI_ASSOC);

// Free result set
mysqli_free_result($result);

mysqli_close($con);

echo json_encode($wat);

