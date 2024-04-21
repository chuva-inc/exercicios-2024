<?php

namespace Chuva\Php\WebScrapping;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Runner for the Webscrapping exercise.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $xpath = new \DOMXPath($dom);

    $query = "//div[@class='col-sm-12 col-md-8 col-lg-8 col-md-pull-4 col-lg-pull-4']";
    $trabalhos = $xpath->query($query);

    // Verifica se foram encontrados elementos
    if ($trabalhos->length > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Título');
        $sheet->setCellValue('B1', 'Autores');
        $sheet->setCellValue('C1', 'Apresentação');
        $sheet->setCellValue('D1', 'Volume');

        $row = 2;
        // Loop através dos elementos encontrados
        foreach ($trabalhos as $trabalho) {
            // Extrai os dados dos elementos filhos
            $titulo = $xpath->query(".//h4[@class='my-xs paper-title']", $trabalho)->item(0)->nodeValue;
            // Consulta XPath para obter autores
            $autores = $xpath->query(".//div[@class='authors']", $trabalho)->item(0)->nodeValue;
            // Consulta XPath para obter apresentação
            $presentation = $xpath->query(".//div[@class='tags mr-sm']", $trabalho)->item(1)->nodeValue;
            // Consulta XPath para obter volume
            $volume = $xpath->query(".//div[@class='volume-info']", $trabalho)->item(0)->nodeValue;
            
            // Adiciona os dados na planilha
            $sheet->setCellValue('A' . $row, $titulo);
            $sheet->setCellValue('B' . $row, $autores);
            $sheet->setCellValue('C' . $row, $presentation);
            $sheet->setCellValue('D' . $row, $volume);
            
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save(__DIR__ . '/../../assets/Planilha.xlsx');

        echo "Planilha gerada e salva com sucesso!";
    }
  }
}

Main::run();
