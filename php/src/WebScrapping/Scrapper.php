<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom) {
    $xpath = new \DOMXPath($dom);
    // Query the HTML for the paper cards.
    $paper_card = $xpath->query('.//a[@class="paper-card p-lg bd-gradient-left"]');
    $filePath = 'exemplo.xlsx';
    $writer = WriterEntityFactory::createXLSXWriter();
    $writer->openToFile($filePath);
    $style = (new StyleBuilder())
      ->setFontBold()
      ->build();
    $lineStyle = (new StyleBuilder())
      ->setShouldWrapText(TRUE)
      ->build();
    $headerRow = WriterEntityFactory::createRowFromArray([
      'ID', 'Title', 'Type', 'Author 1', 'Author 1 Institution',	'Author 2', 
      'Author 2 Institution', 'Author 3', 'Author 3 Institution', 'Author 4', 'Author 4 Institution', 
      'Author 5', 'Author 5 Institution', 'Author 6', 'Author 6 Institution', 'Author 7', 'Author 7 Institution', 'Author 8', 
      'Author 8 Institution', 'Author 9', 'Author 9 Institution', 
    ], $style);
    $writer->addRow($headerRow); 
    $cells = [];
    try {
      // Iterate over the paper cards.
      foreach ($paper_card as $elemento) {
        $title = '';
        // Iterate over the child nodes of the paper card.
        foreach ($elemento->childNodes as $node) {
          // Get the tag name of the child node.
          $node_tagname = $node->tagName;
          // If the tag name is 'h4', then it is the title of the paper.
          if ($node_tagname == 'h4') {
            // Print the title of the paper.
            $title = $node->nodeValue;
            print_r("Titulo: $title \n");
          }
          // If the tag name is 'div', then it is the title of the paper.
          elseif ($node_tagname == 'div') {
            $filhoNo = $node->childNodes;
            $count = 1;
            
            foreach ($filhoNo as $no) {
              /*
               * If the tag name is 'div', 
               * then it is the title of the paper. 
               */
              if ($no->nodeName == 'div') {
                if ($no->getAttribute('class') == 'tags mr-sm') {
                  $type = $no->nodeValue;
                  print_r($type . "\n");
                }
                else {
                  $id = $no->nodeValue;
                  print_r($id . "\n");
                }

              } 
              elseif ($no->nodeName == 'span') {
                $instituicao = $no->getAttribute('title');
                print_r("Instituição: $instituicao \n");
                $autor = $no->textContent;
                print_r("Autores: $autor \n");
                if ($count == 1) {
                  $cells = [
                    WriterEntityFactory::createCell($id),
                    WriterEntityFactory::createCell($title),
                    WriterEntityFactory::createCell($type),
                    WriterEntityFactory::createCell($autor),
                    WriterEntityFactory::createCell($instituicao),
                  ];
                } 
                elseif ($count == 2) {
                  $cells[] = WriterEntityFactory::createCell($autor);
                  $cells[] = WriterEntityFactory::createCell($instituicao);
  
                } 
                elseif ($count == 3) {
                  $cells[] = WriterEntityFactory::createCell($autor);
                  $cells[] = WriterEntityFactory::createCell($instituicao);
  
                } 
                elseif ($count == 4) {
                  $cells[] = WriterEntityFactory::createCell($autor);
                  $cells[] = WriterEntityFactory::createCell($instituicao);
  
                } 
                elseif ($count == 5) {
                  $cells[] = WriterEntityFactory::createCell($autor);
                  $cells[] = WriterEntityFactory::createCell($instituicao);
  
                } 
                elseif ($count == 6) {
                  $cells[] = WriterEntityFactory::createCell($autor);
                  $cells[] = WriterEntityFactory::createCell($instituicao);
  
                } 
                elseif ($count == 7) {
                  $cells[] = WriterEntityFactory::createCell($autor);
                  $cells[] = WriterEntityFactory::createCell($instituicao);
  
                } 
                elseif ($count == 8) {
                  $cells[] = WriterEntityFactory::createCell($autor);
                  $cells[] = WriterEntityFactory::createCell($instituicao);
  
                } 
                elseif ($count == 9) {
                  $cells[] = WriterEntityFactory::createCell($autor);
                  $cells[] = WriterEntityFactory::createCell($instituicao);
  
                }
                $count++;
              }
              
            }
            
          }
               
        } 
        $singleRow = WriterEntityFactory::createRow($cells,$lineStyle);
        $writer->addRow($singleRow);  
      } 
      echo "Tabela criada com sucesso em $filePath \n" ;
    }catch(\DOMException $e){
      print_r($e->getMessage());
     }
     $writer->close();
  }
    
}
