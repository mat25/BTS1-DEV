<?php
$phrase = readline("saisir une phrase : ");
$mot = readline("saisir un mot : ");
$nbOccurence = substr_count(strtolower($phrase),$mot);

echo "le mot \"$mot\" apparait $nbOccurence fois dans la phrase" ;
