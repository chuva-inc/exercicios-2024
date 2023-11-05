<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Writer\Common\Creator\Style\StyleBuilder;
use OpenSpout\Writer\Common\Creator\WriterEntityFactory;

/**
 * Main class to run the exercise.
 */
class Main {

  /**
   * Runner for the Webscrapping exercice.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    @$dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $data = (new Scrapper())->scrap($dom);

    $csvPath = (__DIR__ . '/../../assets/teste.csv');

    $writer = WriterEntityFactory::createCSVWriter();
    $writer->openToFile($csvPath);

    $style = (new StyleBuilder())->setFontName('Arial')->setFontSize(11)->setFontBold()->setCellAlignment(CellAlignment::RIGHT)->build();

    $headers = ['ID', 'Title', 'Type'];
    for ($i = 0; $i < 17; $i++) {
      $headers[] = "Author $i";
      $headers[] = "Author $i Institution";
    }

    $rowFromHeaders = WriterEntityFactory::createRowFromArray($headers);
    $writer->addRow($rowFromHeaders);

    foreach ($data as $paper) {

      $rowData = [$paper->id, $paper->title, $paper->type];

      $authors = array_slice($paper->authors, 0, 17);

      for ($i = 0; $i < 17; ++$i) {
        if (isset($authors[$i])) {

          $author = $authors[$i];

          $rowData[] = $author->name;

          $rowData[] = $author->institution;

        }else{

          // Fill in blank values if there is no corresponding author.
          $rowData[] = '';

          $rowData[] = '';
        }
      }
      $row = WriterEntityFactory::createRowFromArray($rowData);
      $row->setStyle($style);
      $writer->addRow($row);
    }
    $writer->close();

  }

}
