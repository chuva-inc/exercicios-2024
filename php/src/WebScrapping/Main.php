<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Writer\Common\Creator\Style\BorderBuilder;
use OpenSpout\Writer\Common\Creator\Style\StyleBuilder;
use OpenSpout\Writer\Common\Creator\WriterEntityFactory;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    libxml_use_internal_errors(TRUE);
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $data = (new Scrapper())->scrap($dom);

    $maxAuthorsPerRow = 0;
    $valuesRows = [];
    $keysCells = [
      WriterEntityFactory::createCell('ID'),
      WriterEntityFactory::createCell('Title'),
      WriterEntityFactory::createCell('Type'),
    ];

    for ($i = 0; $i < count($data); $i++) {
      $valuesRows[] = [
        WriterEntityFactory::createCell($data[$i]->id),
        WriterEntityFactory::createCell($data[$i]->title),
        WriterEntityFactory::createCell($data[$i]->type),
      ];

      for ($j = 0; $j < count($data[$i]->authors); $j++) {
        if ($j >= $maxAuthorsPerRow) {
          $maxAuthorsPerRow += 1;
          $keysCells[] = WriterEntityFactory::createCell("Author $maxAuthorsPerRow");
          $keysCells[] = WriterEntityFactory::createCell("Author $maxAuthorsPerRow Institution");
        }

        $valuesRows[$i][(($j + 1) * 2) + 1] = WriterEntityFactory::createCell($data[$i]->authors[$j]->name);
        $valuesRows[$i][(($j + 1) * 2) + 2] = WriterEntityFactory::createCell($data[$i]->authors[$j]->institution);
      }
      $valuesRows[$i] = WriterEntityFactory::createRow($valuesRows[$i]);
    }

    $border = (new BorderBuilder())
      ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN)
      ->build();

    $defaultStyle = (new StyleBuilder())
      ->setFontSize(10)
      ->setFontName("Arial")
      ->build();

    $keysStyle = (new StyleBuilder())
      ->setBorder($border)
      ->setFontBold()
      ->build();

    $keysRow = WriterEntityFactory::createRow($keysCells, $keysStyle);

    $dirPath = __DIR__ . '/../../results/';
    $filePath = $dirPath . 'data.xlsx';

    if (!is_dir($dirPath)){
      mkdir($dirPath);
    }

    $writer = WriterEntityFactory::createXLSXWriter();
    $writer->setDefaultRowStyle($defaultStyle)->openToFile($filePath);

    $writer->addRow($keysRow);
    $writer->addRows($valuesRows);

    $writer->close();

  }

}
