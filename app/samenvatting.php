<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto+Slab">
 <!-- Milligram CSS -->
 <link rel="stylesheet" href="../../../app/vendor/github.css">
 <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/atom-one-dark.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
<script>hljs.highlightAll();</script>
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

$url =  "{$_SERVER['REQUEST_URI']}";

$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

//echo $url;
//echo "<br>";
//echo $escaped_url;
//echo "<br>";
//echo urldecode($escaped_url);
//echo "<br>";
$decoded =  urldecode($escaped_url);
$new_name = substr($decoded, strpos($decoded, 'hp/') + 3);
//echo "<br>";
//echo $new_name;

$exploded = explode("/",$new_name);

$testurl = strstr($exploded[1], '_');
    
$goodUrl = str_replace('_', '', $testurl);



require_once __DIR__.'/vendor/autoload.php';
$parser = new \cebe\markdown\GithubMarkdown();

chdir("..");

if(isset($_GET['file'])){
   echo "<title> Deadlines </title>";
   $contents = file_get_contents("Deadlines.md");
   //echo "testttt";
}else{

   echo "<title>". $goodUrl . "</title>";
chdir($exploded[0]);
$contents = file_get_contents($exploded[1]. ".md");
//echo "geen test";
}



//$Parsedown = new Parsedown();
//echo $Parsedown->text($contents)'
?>
<article class="markdown-body">
	

<?php echo $parser->parse($contents); 
if(isset($_GET['file'])){
echo "<footer> &copy; Quinten Bosch | Ik ben niet verantwoordelijk voor mogelijke fouten. | " . "Laatst gewijzigd: " . date ("Y/m/d H:i",filemtime("Deadlines.md"));
} else{
echo "<footer> &copy; Quinten Bosch | Ik ben niet verantwoordelijk voor mogelijke fouten. | " . "Laatst gewijzigd: " . date ("Y/m/d H:i",filemtime($exploded[1]. ".md"));
  
}
?>
</article>
