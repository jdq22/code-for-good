<?php

$runstring = "java -Xmx1g -jar \"something.jar\" $_GET['compareTextField']";
exec($str,$output);
print_r($output);

?>