<?php
$html = file_get_contents("https://proceedings.science/papers-published");
libxml_use_internal_errors(true);
$documento = new DOMDocument();
$documento->loadHTML($html);

$domNodelist = $documento->getElementsByTagName("article");
$contentList = [];

foreach ($domNodelist as $article) {
    $title = $article->getElementsByTagName("h5")[0]->textContent;
    $abstract = $article->getElementsByTagName("p")[0]->textContent;
    
    $contentList[] = [$title, $abstract];
}

// Abrir arquivo
$arquivo = fopen('file.csv', 'w');
// Escrever conteúdo
foreach ($contentList as $content) {
    fputcsv($arquivo, $content);
}
fclose($arquivo);
?>
