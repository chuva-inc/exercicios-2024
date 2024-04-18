<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Common\Entity\Cell;
use OpenSpout\Common\Entity\Row;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    @$dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $papers = (new Scrapper())->scrap($dom);

    $writer = new \OpenSpout\Writer\XLSX\Writer();
    $writer->openToFile('src/saidaDados/planilhaDados.xlsx');

    // Write your logic to save the output file bellow.
    print_r($papers);
  }

}
