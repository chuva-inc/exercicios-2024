<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
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
    
    
    // Write your logic to save the output file bellow. 
    /* Exemplo de captura funcionando
     * $domNodeList = $xpath->query('.//a[@class="paper-card p-lg bd-gradient-left"]');
     */
    $xpath = new \DOMXPath($dom);


    $paper_card = $xpath->query('.//a[@class="paper-card p-lg bd-gradient-left"]');

    $author = $xpath->query('.//div[@class="authors"]');
    
    foreach ($paper_card as $elemento) { 
      foreach ($elemento->childNodes as $node) {
        if (isset($node->tagName)) {
          if(($node->tagName) == 'h4'){
            $title = $node->nodeValue;
            print_r("Titulo: $title \n");
          }  
        } 
      }
    }
    foreach ($author as $elemento) { 
      foreach ($elemento->childNodes as $node) {
            print_r($node->prefix);
            $authors = $node->nodeValue;
            print_r("autores: $authors \n");
      }
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
    /* print_r($data);   */ 
  }

}
?>