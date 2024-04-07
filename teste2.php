<?php
$html = file_get_contents("https://proceedings.science/papers-published");
libxml_use_internal_errors(true);
$documento = new DOMDocument();
$documento->loadHTML($html);

$domNodelist = $documento->getElementsByTagName("a");
$linklist = [];

foreach ($domNodelist as $link) {
    $href = $link->getAttribute("href");
    if (!empty($href)) {
        $linklist[] = $href;
    }
}

// Abrir arquivo
$arquivo = fopen('file.csv', 'w');
// Escrever conteúdo
foreach ($linklist as $link) {
    fputcsv($arquivo, [$link]);
}
fclose($arquivo);

