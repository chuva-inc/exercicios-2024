<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Common\Entity\Cell;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Writer\XLSX\Writer;

/**
 * Runner for the Web scraping exercise.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    @$dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $papers = (new Scrapper())->scrap($dom);

    $writer = new Writer();
    $writer->openToFile(__DIR__ . '/../../assets/scrappedData.xlsx');

    // Adding spreadsheet header.
    $header = [
      Cell::fromValue('ID'),
      Cell::fromValue('Title'),
      Cell::fromValue('Type'),
      Cell::fromValue('Author 1'),
      Cell::fromValue('Author 1 Institution'),
      Cell::fromValue('Author 2'),
      Cell::fromValue('Author 2 Institution'),
      Cell::fromValue('Author 3'),
      Cell::fromValue('Author 3 Institution'),
      Cell::fromValue('Author 4'),
      Cell::fromValue('Author 4 Institution'),
      Cell::fromValue('Author 5'),
      Cell::fromValue('Author 5 Institution'),
      Cell::fromValue('Author 6'),
      Cell::fromValue('Author 6 Institution'),
      Cell::fromValue('Author 7'),
      Cell::fromValue('Author 7 Institution'),
      Cell::fromValue('Author 8'),
      Cell::fromValue('Author 8 Institution'),
      Cell::fromValue('Author 9'),
      Cell::fromValue('Author 9 Institution'),
      Cell::fromValue('Author 10'),
      Cell::fromValue('Author 10 Institution'),
      Cell::fromValue('Author 11'),
      Cell::fromValue('Author 11 Institution'),
      Cell::fromValue('Author 12'),
      Cell::fromValue('Author 12 Institution'),
      Cell::fromValue('Author 13'),
      Cell::fromValue('Author 13 Institution'),
      Cell::fromValue('Author 14'),
      Cell::fromValue('Author 14 Institution'),
      Cell::fromValue('Author 15'),
      Cell::fromValue('Author 15 Institution'),
      Cell::fromValue('Author 16'),
      Cell::fromValue('Author 16 Institution'),
      Cell::fromValue('Author 17'),
      Cell::fromValue('Author 17 Institution'),
      Cell::fromValue('Author 18'),
      Cell::fromValue('Author 18 Institution'),
      Cell::fromValue('Author 19'),
      Cell::fromValue('Author 19 Institution'),
    ];

    $singleRow = new Row($header);
    $writer->addRow($singleRow);

    foreach ($papers as $paper) {
      // Create a row for each paper.
      $row = new Row([
              Cell::fromValue($paper->id),
              Cell::fromValue($paper->title),
              Cell::fromValue($paper->type),
            ]);

  // Array to store author info.
  $authorInfo = [];

  // For each author in authors, add info to the array.
  foreach ($paper->authors as $author) {
    $authorInfo[] = $author->name; // Theoretically here prints the author's name
    $authorInfo[] = $author->institution; // Theoretically here prints the author's institution
  }

  // Create new row combining paper info cells with author info cells.
  $row = new Row(array_merge($row->getCells(), array_map(fn($value) => Cell::fromValue($value), $authorInfo)));

  // Write the new row that now has all the info.
  $writer->addRow($row);
    }

    // Close the writer to prevent issues.
    $writer->close();
  }
  
}
