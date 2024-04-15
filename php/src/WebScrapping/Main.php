<?php

namespace Chuva\Php\WebScrapping;
require_once 'Scrapper.php'; // Importe a classe Scrapper
require_once 'PHPExcel.php'; // Importe a biblioteca PHPExcel
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

    $data = (new Scrapper())->scrap($dom);

    // Escrever os dados em um arquivo XLSX
    $objPHPExcel = new \PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();

    // Preencher o arquivo XLSX com os dados extraídos
    $row = 1;
    foreach ($data as $paper) {
        $sheet->setCellValue('A' . $row, $paper->title);
        $sheet->setCellValue('B' . $row, $paper->type);
        // Adicione mais células e dados conforme necessário
        $row++;
    }

    // Salvar o arquivo
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save(__DIR__ . '/../../webscraping/model.xlsx');
  }
}

Main::run();
