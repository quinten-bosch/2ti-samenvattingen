<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto+Slab">
 <!-- Milligram CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
 <link rel="stylesheet" href="https://2ti.quintenbosch.be/dark.css">
  <style>
 p { display: inline; }
 body{
    font-family: 'Roboto Slab', serif;
 }
 code{ font-size: 1.1em; 
   overflow-wrap: break-word;
   
}

pre{
   max-width: 90%; overflow-wrap: break-word;
}

 footer{ opacity: 0.7;}
  </style>


</head>
<body>

<?php

$testurl = strstr($_GET['file'], '_');
    
$goodUrl = str_replace('_', '', $testurl);



if($_GET["file"] == "Deadlines"){
   echo "<title> Deadlines </title>";
   //echo "testttt";
}else{

   echo "<title>". $goodUrl . "</title>";
chdir($_GET["folder"]);
//echo "geen test";
}

include('Parsedown.php');
$contents = file_get_contents($_GET["file"]. ".md");
$Parsedown = new Parsedown();
echo $Parsedown->text($contents);

echo "<footer> &copy; Quinten Bosch | Ik ben niet verantwoordelijk voor mogelijke fouten. | " . "Laatst gewijzigd: " . date ("Y/m/d H:i",filemtime($_GET['file']. ".md"));
?>