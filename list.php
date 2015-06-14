<?php
/*require('./vendor/autoload.php'); */
ini_set("allow_url_include", true);
include("header.php");

?>

<div class="row " >
<div class="container">
<div class = "col-lg-12"  >

<?php
// <p align="center">
// <img src="assets/cmacc-trans.png"  height="50px" />
// </p>

if(! ($dir == './')) {
        $rootdir = pathinfo($dir);

 	
	echo "<div id='updir'><h3 class='sc subtitle'><a href=$_SERVER[PHP_SELF]?action=list&file=".$rootdir['dirname']."/><img src='assets/arrowup.png' height=25>".$rootdir['dirname']."</a>/".$rootdir['filename']."</h3><br>";

 	echo "<center><a href=https://github.com/$GitHubRepo/blob/master/Doc/".$dir.">Github</a></center>";

#   echo "<h2 class='sc subtitle2'>". $rootdir['filename']."</h2>";
} 

$files = scandir($path.$dir);

if(file_exists($path.$dir . 'include.php')) {
echo "<div class='includers'>"; 
   include $path.$dir . 'include.php';
echo "</div>";
}


echo '<div class="listings">';
echo "<div id='content-list'>";
foreach($files as $f) {

        if(is_dir($path.$dir.$f)) {
	  if( !( ($f == '.') || ($f == '..') || ($f == '.git')) ) {

                        echo "<br><a href=$_SERVER[PHP_SELF]?action=list&file=$dir$f/><img height=20 src='assets/folder.png'> $f</a>";
                }
        }
        else {
	  if( !( ($f == 'include.php') || preg_match('/^\./', $f) || !(stripos($f, ".html") == 0)) ) {
                        echo "<br><a href=$_SERVER[PHP_SELF]?action=source&file=$dir$f><img height=20 src='assets/play.png'> $f</a>";
                }
        }

}
echo "</div></div>";
?>


