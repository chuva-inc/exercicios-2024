<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Spreadsheet;

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

    // Write your logic to save the output file bellow.

    $spreadsheetFile = __DIR__ . "/../../output/output.xlsx";

    if (!file_exists(dirname($spreadsheetFile))) {
      mkdir(dirname($spreadsheetFile), 0777, TRUE);
    }

    $spreadsheet = new Spreadsheet($spreadsheetFile);
    foreach ($data as $item) {
      $spreadsheet->addData($item);
    }

    $spreadsheet->save();
  }

}
