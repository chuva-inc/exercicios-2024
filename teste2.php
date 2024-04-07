<?php
$html = file_get_contents("https://proceedings.science/papers-published");
libxml_use_internal_errors(true);
$documento = new DOMDocument();
$documento ->loadHTML($html);

$domNodelist = $documento->getElementsByTagName("a");
$linklist = '';

/**@var DOMNode $elemento */
foreach($domNodelist as $link){
    $href .= $link->getAttribute("href");
    
    if(!empty($href)){
        $linklist .= $link->getAttribute("href") . "<br>";
      }
}

//abrir aquivo
echo $linklist;
$copia= $linklist;
$cabecalho= ['local', 'nome', 'e-mail'];

$arquivo =fopen('file.csv', 'w');
//escrever conteudo
fputcsv($arquivo, $copia);
fclose($arquivo);

