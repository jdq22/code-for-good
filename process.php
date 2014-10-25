<?php
$noQuotesCur = str_replace( '"','',$_GET['compareCurField'] );
$noQuotesEmail = str_replace( '"','',$_GET['compareTextField'] );

$runstring = "java -Xmx1g -jar \"testJar.jar\" \"" . $noQuotesCur . "\" \"" . $noQuotesEmail . "\"";
exec($runstring,$output);
echo $_GET['compareTextField']. "<br />" . $_GET['compareCurField'] . "<br />";
return $output[0];


?>