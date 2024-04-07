<?php
$html = file_get_contents("https://github.com/chuva-inc/exercicios-2024/blob/master/php/assets/origin.html");
libxml_use_internal_errors(true);
$documento = new DOMDocument();
$documento ->loadHTML($html);
$xPath = new DOMXPATH($documento);
$domNodelist = $xPath->query('.//authors');

/**@var DOMNode $elemento */
foreach($domNodelist as $elemento){
    echo $elemento->texxtContent .PHP_EOL . "<br>";
    
}
