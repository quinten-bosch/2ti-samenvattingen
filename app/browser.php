<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto+Slab">
    <!-- Milligram CSS -->
    <link rel="stylesheet" href="../vendor/milligram.css">
    <link rel="stylesheet" href="../vendor/dark.css">
  <style>
  
  body {
    margin-left: 25%;
    padding-top: 5%;
    font-family: 'Roboto Slab', serif;
  }

  a, a:visited, a:hover, a:active {
    color: inherit;
  }
  
  </style>

</head>
<body>

<?php
chdir("..");
$dirr = $_GET['folder'];
echo "<title> $dirr </title>";
echo "<h2> $dirr </h2>";

chdir($dirr);
  
$myfiles = array_diff(scandir(getcwd()), array('.', '..', 'Parsedown.php', '.git', '.gitattributes')); 

foreach ($myfiles as $value) {
    $testurl = strstr($value, '_');
    $goodUrl = str_replace('_', '', $testurl);
    $goodUrl = str_replace('.md', '', $goodUrl);
    $url2 = $value;
    $goodUrl2 = str_replace('.md', '', $url2);
    echo "<h4><a href='samenvatting.php?folder=$dirr&file=$goodUrl2 ' target='__blank'> $goodUrl </a></h4>";
  
  }
?>
</body>
</html>