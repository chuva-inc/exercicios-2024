<?php

namespace Chuva\Php\WebScrapping;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    libxml_use_internal_errors(true);
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');
    $data = (new Scrapper())->scrap($dom);

    $writer = WriterEntityFactory::createXLSXWriter();

    $filePath = 'D:\Users\Rafael\Documents\GitHub\exercicios-2024\php\src\WebScrapping\output.xlsx';

    $writer->openToFile($filePath);
  
  $writer->addRow(WriterEntityFactory::createRowFromArray([
    'ID', 'Title', 'Type',
    'Author 1', 'Author 1 Instituition',
    'Author 2', 'Author 2 Instituition',
    'Author 3', 'Author 3 Instituition',
    'Author 4', 'Author 4 Instituition',
    'Author 5', 'Author 5 Instituition',
    'Author 6', 'Author 6 Instituition',
    'Author 7', 'Author 7 Instituition',
    'Author 8', 'Author 8 Instituition',
    'Author 9', 'Author 9 Instituition',
  ]));

  //Iterando sobre os dados e adicionando-os à planilha
  foreach ($data[0] as $trabalho) {
    $id = $trabalho[0];
    $titulo = $trabalho[1];
    $tipo = $trabalho[2];
    $autores = array_slice($trabalho, 3, count($trabalho) - 1);

  //Array para armazenar todos os autores e instituições
    $autoresEInstituicoes = [];

  //Iterando sobre os autores e suas instituições em pares
  for ($i = 0; $i < count($autores); $i += 2) {
      $autor = $autores[$i];
      $instituicao = $autores[$i + 1];
      $autoresEInstituicoes[] = $autor;
      $autoresEInstituicoes[] = $instituicao;
  }

  // Adicionando uma linha com os dados do trabalho atual
  $rowData = array_merge([$id, $titulo, $tipo], $autoresEInstituicoes);
  $writer->addRow(WriterEntityFactory::createRowFromArray($rowData));
}
$writer->close();
    echo 'Excel criado com sucesso!';
  }

}

?>