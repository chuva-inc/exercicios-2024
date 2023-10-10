<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

class Main {
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $data = (new Scrapper())->scrap($dom);

    // Criando uma planilha e adicionando os dados
    self::generateSpreadsheet($data);
  }

  public static function generateSpreadsheet(array $data): void {
    // Criando um novo escritor XLSX
    $writer = WriterEntityFactory::createXLSXWriter();

    // Abrindo o arquivo para escrita
    $writer->openToFile('planilha.xlsx');

    // Adicionando as colunas de títulos
    $headerRow = WriterEntityFactory::createRow();

    // Adicionando os títulos das colunas
    $headerRow->addCell(WriterEntityFactory::createCell('Title'));
    $headerRow->addCell(WriterEntityFactory::createCell('Type'));
    $headerRow->addCell(WriterEntityFactory::createCell('Authors'));
    $headerRow->addCell(WriterEntityFactory::createCell('ID'));

    $writer->addRow($headerRow);

    // Adicionando os dados as colunas
    foreach ($data as $item) {
      $rowData = WriterEntityFactory::createRow();
      $rowData->addCell(WriterEntityFactory::createCell($item['Title']));
      $rowData->addCell(WriterEntityFactory::createCell($item['Type']));
      $rowData->addCell(WriterEntityFactory::createCell($item['Authors']));
      $rowData->addCell(WriterEntityFactory::createCell($item['ID']));
      
      $writer->addRow($rowData);
    }

    // Fechando o escritor
    $writer->close();

  }
}