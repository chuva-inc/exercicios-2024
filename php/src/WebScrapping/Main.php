<?php

namespace Chuva\Php\WebScrapping;
use OpenSpout\Writer\Common\Creator\WriterEntityFactory;
use OpenSpout\Writer\Common\Creator\Style\StyleBuilder;
use OpenSpout\Writer\Common\Creator\Style\BorderBuilder;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\CellAlignment;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    libxml_use_internal_errors(true);
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $data = (new Scrapper())->scrap($dom);

    /**
     * Initializes a xlsx file and inserts the scraped data there.
     */
    $filePath = __DIR__.'/data.xlsx';

    $defaultStyle = (new StyleBuilder())
              ->setFontSize(10)
              ->setFontName("Arial")
              ->build();

    $writer = WriterEntityFactory::createXLSXWriter();
    $writer->setDefaultRowStyle($defaultStyle)->openToFile($filePath);


    $maxAuthorsPerRow = 0;
    $valuesRows = array();
    $keysCells = [
      WriterEntityFactory::createCell('ID'),
      WriterEntityFactory::createCell('Title'),
      WriterEntityFactory::createCell('Type'),
    ];

    for ($i=0; $i < count($data); $i++) { 
      $valuesRows[] = [
        WriterEntityFactory::createCell($data[$i]->id),
        WriterEntityFactory::createCell($data[$i]->title),
        WriterEntityFactory::createCell($data[$i]->type),
      ];

      for ($j=0; $j < count($data[$i]->authors); $j++) { 
        if ($j >= $maxAuthorsPerRow){
          $maxAuthorsPerRow += 1;
          $keysCells[] = WriterEntityFactory::createCell("Author $maxAuthorsPerRow");
          $keysCells[] = WriterEntityFactory::createCell("Author $maxAuthorsPerRow Institution");
        }
        
        $valuesRows[$i][(($j+1)*2)+1] = WriterEntityFactory::createCell($data[$i]->authors[$j]->name);
        $valuesRows[$i][(($j+1)*2)+2] = WriterEntityFactory::createCell($data[$i]->authors[$j]->institution);
      }
      $valuesRows[$i] = WriterEntityFactory::createRow($valuesRows[$i]);
    }



  $border = (new BorderBuilder())
            ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN)
            ->build();

  $KeyStyle = (new StyleBuilder())
            ->setBorder($border)
            ->setFontBold()
            ->build();

  
  $KeysRow = WriterEntityFactory::createRow($keysCells, $KeyStyle);
  $writer->addRow($KeysRow);
  $writer->addRows($valuesRows);

  $writer->close();

  }

}