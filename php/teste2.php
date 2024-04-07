<?php
$html = file_get_contents("https://proceedings.science/papers-published");

// Verifica se o HTML foi carregado corretamente
if ($html === false) {
    echo "Erro ao acessar a página.";
    exit;
}

libxml_use_internal_errors(true);
$documento = new DOMDocument();

// Verifica se o HTML pode ser carregado como um documento DOM
if (!$documento->loadHTML($html)) {
    echo "Erro ao analisar o HTML.";
    exit;
}

$domNodelist = $documento->getElementsByTagName("a");
$linklist = [];

foreach ($domNodelist as $link) {
    $href = $link->getAttribute("href");
    if (!empty($href)) {
        $linklist[] = $href;
    }
}

// Verifica se foram encontrados links na página
if (empty($linklist)) {
    echo "Nenhum link encontrado na página.";
    exit;
}

// Tenta abrir o arquivo CSV para escrita
$arquivo = fopen('file.csv', 'w');

// Verifica se o arquivo CSV foi aberto corretamente
if ($arquivo === false) {
    echo "Erro ao abrir o arquivo CSV.";
    exit;
}

// Escreve os links no arquivo CSV
foreach ($linklist as $link) {
    if (fputcsv($arquivo, [$link]) === false) {
        echo "Erro ao escrever no arquivo CSV.";
        fclose($arquivo);
        exit;
    }
}

// Fecha o arquivo CSV
fclose($arquivo);

echo "Os links foram escritos no arquivo CSV com sucesso.";
?>
