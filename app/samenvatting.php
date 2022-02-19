<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto+Slab">
 <!-- Milligram CSS -->
 <link rel="stylesheet" href="vendor/github.css">

  <style>
 p { display: inline; }
 body{
    font-family: 'Roboto Slab', serif;
 }
 code{ font-size: 1.1em; 
   overflow-wrap: break-word;
   
}
html, body {
   background-color: #0d1117;
  margin:0px;
  height:100%;
}

.markdown-body {
		box-sizing: border-box;
		min-width: 200px;
		margin: 0px;
		margin: 0 auto;
      border: 0px;
		padding: 45px;
      
	}

	@media (max-width: 767px) {
		.markdown-body {
			padding: 15px;
		}
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

require_once __DIR__.'/vendor/autoload.php';
$parser = new \cebe\markdown\GithubMarkdown();

chdir("..");

if($_GET["file"] == "Deadlines"){
   echo "<title> Deadlines </title>";
   //echo "testttt";
}else{

   echo "<title>". $goodUrl . "</title>";
chdir($_GET["folder"]);
//echo "geen test";
}


$contents = file_get_contents($_GET["file"]. ".md");
//$Parsedown = new Parsedown();
//echo $Parsedown->text($contents)'
?>
<article class="markdown-body">
	

<?php echo $parser->parse($contents); 

echo "<footer> &copy; Quinten Bosch | Ik ben niet verantwoordelijk voor mogelijke fouten. | " . "Laatst gewijzigd: " . date ("Y/m/d H:i",filemtime($_GET['file']. ".md"));
?>
</article>
