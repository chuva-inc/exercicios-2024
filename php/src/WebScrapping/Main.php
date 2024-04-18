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
    $writer->openToFile(__DIR__ . '/../../assets/scrappedData.xlsx');

    //adicionando cabeçalho da planilha
    $header = [
      Cell::fromValue('ID'),
      Cell::fromValue('Title'),
      Cell::fromValue('Type'),
  ];
  
    $singleRow = new Row($header);
    $writer->addRow($singleRow);

    foreach ($papers as $paper) {
      // Create a row for each paper
      $row = new Row([
          Cell::fromValue($paper->id),
          Cell::fromValue($paper->title),
          Cell::fromValue($paper->type),
      ]);
      $writer->addRow($row);
  
      // Process authors for this paper
      foreach ($paper->authors as $author) {
          // Create a new row for each author
          $authorRow = new Row([
              Cell::fromValue($author->name), // Assuming 'name' is a property in your Person class
              Cell::fromValue($author->institution), // Assuming 'institution' is a property in your Person class
          ]);
          $writer->addRow($authorRow);
      }
  }
  
  $writer->close();
}
}