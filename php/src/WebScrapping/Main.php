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
    $data = (new Scrapper())->scrap($dom);    
    // Write your logic to save the output file bellow.

    $writer = WriterEntityFactory::createXLSXWriter();
    $writer->openToFile(__DIR__ . '/../../assets/origin.xlsx'); // write data to a file or to a PHP stream
    $cells1 = [];
    $cells2 = [];

    /**
     * Esse trecho é onde eu faço a manipulação dos dados para gerar o arquivo excel
     * que foi o objetivo mais desafiador , onde pesquisei muitos lugares , documentacao , etc 
     */
    foreach ($data as $chave => $tag) {
      foreach ($tag as $person) {
        if (gettype($person) == "integer" || gettype($person) == "string") {
          if ($chave == 0) {
            array_push($cells1, WriterEntityFactory::createCell($person));
          }else {
            array_push($cells2, WriterEntityFactory::createCell($person));
          }
        } elseif (gettype($person) == "array") {
          foreach ($person as $authors) {
            foreach ($authors as $author) {
              if ($chave == 0) {
                array_push($cells1, WriterEntityFactory::createCell($author));
              }else {
                array_push($cells2, WriterEntityFactory::createCell($author));
              }
            }
          }
        }
      }
    }

    /** add a row at a time */
    $firstRow = WriterEntityFactory::createRow($cells1);
    $secondRow = WriterEntityFactory::createRow($cells2);
    $writer->addRow($firstRow);
    $writer->addRow($secondRow);
    $writer->close();
  }
}