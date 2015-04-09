<?php

use Zombies\GameBundle\Entity\Place;
use Zombies\GameBundle\Utils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

$coordinate = $_REQUEST['contentCoordinateArray'];

$con=mysqli_connect("localhost","root","","zombies");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql_prepare="SELECT place_id FROM coordinates WHERE x_coordinate = ".strval($coordinate);
$result_prepare = mysqli_query($con,$sql_prepare);
$watwat = mysqli_fetch_assoc($result_prepare);

$id = $watwat["place_id"];

mysqli_free_result($result_prepare);

$sql="SELECT inhabitants.males, inhabitants.females, inhabitants.children, resources.water, resources.food, resources.weapons FROM inhabitants INNER JOIN resources WHERE inhabitants.place_id = ".strval($id)." AND resources.place_id =".strval($id);
$result=mysqli_query($con,$sql);

// Fetch all
$allContents = mysqli_fetch_all($result,MYSQLI_ASSOC);

// Free result set
mysqli_free_result($result);

mysqli_close($con);

echo json_encode($allContents);