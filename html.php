<body style="margin:40;padding:0">
<?php

echo "<a href=index.php?action=source&file=" .$dir.">Source</a><br><br>";

$document = `perl parser-print.pl $path/$dir`;

$minDocLength = 1;

if (strlen($document) > $minDocLength){  

echo "<form action=$_SERVER[PHP_SELF] method='post'>
        <textarea id='textedit' cols=125 rows=30 name='newcontent' style='padding:20px;'>";

echo "Model.Root={Body}\r\n\r\nBody=". $document;


echo '  </textarea><br>
        <input class="btn btn-info" type="submit" name="submit" value="Save">
        <input type="hidden" name="file" value="'.$dir.'.html">
        <input type="hidden" name="action" value="source">
        </form>';



  echo $document;}
 else {
   echo "Nothing to Show";


}



?>
