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
    $outputFilePath = "result.xlsx";

    $writer = WriterEntityFactory::createXLSXWriter();
    $writer->openToFile($outputFilePath);

    $header = [ "ID","Title","Type"];
    
    $authorsTotal = 0;

    foreach ($allData as $singleData) {
      $authorsCount = $singleData->getAuthorCount();
      if ($authorsCount > $authorsTotal) {
        $authorsTotal = $authorsCount;
      }
    }

    for ($i = 1; $i <= $authorsTotal; $i++) {
      $header[] = "Author $i";
      $header[] = "Author $i Institution";
    }

    $headerRow = WriterEntityFactory::createRowFromArray($header);
    $writer->addRow($headerRow);

    $writer->close();

  }

}
