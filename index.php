<?php
include_once("markdown.php");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Lan Party</title>
    <meta charset="UTF-8"> 
    <link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>

<?php



$directory = "games/";
 

$files = glob($directory . "*");
 

foreach($files as $file)
{

 if(is_dir($file))
 {
?>

<div id="game">
<span id="title"><b><?php echo basename($file); ?></b></span><br>
<span id="desc"> <?php 
if (file_exists($file . "/desc.txt")){
	echo Markdown(utf8_encode(file_get_contents($file . "/desc.txt"))) ;
}else{
    echo "Keine Beschreibung";
}

?></span>

	<ul id="files">
<?php
$downloadfiles = glob($file . "/data/*");
 

foreach($downloadfiles as $dfile)
{
?>
<li><a href="<?php echo $dfile; ?>"><?php echo basename($dfile); ?></a></li>
<?php
}
?>
</ul>

</div>


  
 

<?php


 }
}

?>

</body>
</html>