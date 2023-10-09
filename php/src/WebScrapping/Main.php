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

    /**
     * data call the method scrap of Scrapper class.
     *
     * @var array $data
     */
    $data = (new Scrapper())->scrap($dom);

    $outputFilePath = "GaloScrapper_MarcosTulio.xlsx";


    // Writer XLSX using Spout.
    $writer = WriterEntityFactory::createXLSXWriter();
    $writer->openToFile($outputFilePath);

    $header = [
      "ID",
      "Title",
      "Type",
    ];

    $maxAuthors = 0;

    /**
     * Iterating in all objects and counting just authors number.
     *
     * @var mixed $paper
     */
    foreach ($data as $paper) {
      $numAuthors = count($paper->getAuthors());
      if ($numAuthors > $maxAuthors) {
        $maxAuthors = $numAuthors;
      }
    }

    for ($i = 1; $i <= $maxAuthors; $i++) {

      // Loop to create headers for authors and institutions.
      // Each iteration generates a pair of headers.
      $header[] = "Author $i";
      $header[] = "Author $i Institution";
    }

    // Creates a header row for the file.
    $headerRow = WriterEntityFactory::createRowFromArray($header);
    $writer->addRow($headerRow);

    foreach ($data as $paper) {
      $rowData = [
        $paper->getId(),
        $paper->getTitle(),
        $paper->getType(),
      ];

      /**
       * Iterating all objects and return authors and institutions.
       *
       * @var array $author
       */
      foreach ($paper->getAuthors() as $author) {
        /**
         * The method returns the name of the author.
         *
         * @var string $authorName
         */
        $authorName = $author->getName();
        $institution = $author->getInstitution();

        // Making assignments to the array.
        $rowData[] = $authorName;
        $rowData[] = $institution;
      }

      // Creating the rows from array $rowData.
      $dataRow = WriterEntityFactory::createRowFromArray($rowData);
      $writer->addRow($dataRow);
    }

    $writer->close();
    echo "Dados salvos em $outputFilePath\n";
  }

}
