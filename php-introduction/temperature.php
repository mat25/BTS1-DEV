<?php

$temperatureCelcius = readline("saisir une temperature en Celcius : ");
$temperatureFahrenheight = $temperatureCelcius  * 1.8 +32 ;

echo "La temperature en fahrenheight est $temperatureFahrenheight °F";