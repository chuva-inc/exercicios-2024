<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run() {
    libxml_use_internal_errors(TRUE);
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');
   
    $data = (new Scrapper())->scrap($dom);

    $xpath = new \DOMXPath($dom);
    $domNodeList = $xpath->query('.//a[@class="paper-card p-lg bd-gradient-left"]');

    print_r($domNodeList);
    // Write your logic to save the output file bellow.    
    foreach ($domNodeList as $elemento) {
      
      print_r($elemento);
    }

    
    /* $filePath = 'exemplo.xlsx';
      $writer = WriterEntityFactory::createXLSXWriter();
      $writer->openToFile($filePath);

      $style = (new StyleBuilder())
          ->setFontBold()
          ->build();

      $headerRow = WriterEntityFactory::createRowFromArray(['ID','Title',	'Type',	'Author 1',	'Author 1 Institution',	'Author 2'	,'Author 2 Institution', 'Author 3','Author 3','Author 3 Institution'], $style);
      $writer->addRow($headerRow); 


      foreach ($elements as $element) {
          $writer->addRow($data);
      }

      $writer->close();

      echo "Tabela criada com sucesso em $filePath \n" ;  */
    print_r($data);   
  }

}
?>