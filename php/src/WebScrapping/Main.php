<?php

namespace Chuva\Php\WebScrapping;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $allData = (new Scrapper())->scrap($dom);

    // Write your logic to save the output file bellow.
    
    // Define o arquivo de saída
    $outputFilePath = "result.xlsx";

    // Cria um novo objeto Writer para criar um arquivo XLSX
    $writer = WriterEntityFactory::createXLSXWriter();
    // Abre o arquivo de saída para escrita
    $writer->openToFile($outputFilePath);

    // Define as informações fixas do cabeçalho da planilha
    $header = [ "ID","Title","Type"];

    // Inicializa a variável para armazenar o número máximo de autores
    $authorsTotal = 0;

    // Itera sobre todos os dados para determinar o número máximo de autores em um único item de dados
    foreach ($allData as $singleData) {
      $authorsCount = $singleData->getAuthorCount();
      // Verifica se o número de autores em $authorsCount é maior que o número máximo atual de autores
      if ($authorsCount > $authorsTotal) {
        // Atualiza o número total de autores se a condicional for verdadeira
        $authorsTotal = $authorsCount;
      }
    }

    // Adiciona autor e instituição ao cabeçalho da planilha
    for ($i = 1; $i <= $authorsTotal; $i++) {
      $header[] = "Author $i";               // Adiciona coluna para o nome do autor
      $header[] = "Author $i Institution";   // Adiciona coluna para a instituição do autor
    }

    // Cria uma linha de cabeçalho da planilha usando os dados do cabeçalho
    $headerRow = WriterEntityFactory::createRowFromArray($header);
    // Adiciona a linha de cabeçalho à planilha
    $writer->addRow($headerRow);

    // Fecha o arquivo de saída
    $writer->close();

  }

}
