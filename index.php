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
  
  body {
    margin-left: 25%;
    padding-top: 5%;
  }

  body {
  font-family: 'Roboto Slab', serif;
}

  a, a:visited, a:hover, a:active {
    color: inherit;
  }
  
  </style>


</head>
<body>


<title> Samenvattingen 2TI </title>
<h2>Samenvattingen 2TI (SO)</h2> 
<?php



$myfiles = array_diff(scandir(getcwd()), array('.', '..', 'lars', 'Parsedown.php', 'index.php', 'browser.php', 'parse.php', 'dark.css', 'samenvatting.php', 'Deadlines.md', '.git', '.gitattributes', 'README.md', '.github' )); 

echo "<h4><a href='samenvatting.php?file=Deadlines'?> Deadlines</a></h4>";
foreach ($myfiles as $value) {
    echo "<h4><a href='browser.php?folder=$value' > $value </a></h4>";
  }
  

  ?>
</body>
</html>