<?php

$html = file_get_contents('file:///C:/Users/hugor/OneDrive/Documentos/GitHub/exercicios-2024/php/assets/origin.html');

libxml_use_internal_errors(true);

$domDocument = new DOMDocument();
$domDocument->loadHTML($html);

$linkTags = $domDocument->getElementsByTagName("a");

$linkList = '';

foreach ($linkTags as $link) {
    $href = $link->getAttribute('href');

    if(!empty($href)){
        $linkList .= $link->getAttribute('href') . "<br>";
    }
}

file_put_contents("ListaDeLinks", $linkList);
