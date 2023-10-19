<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Common\Entity\Row;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Spout\Table;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom){
    $xpath = new \DOMXPath($dom);

    # Query the HTML for the paper cards
    $paper_card = $xpath->query('.//a[@class="paper-card p-lg bd-gradient-left"]');
    
    $filePath = 'exemplo.xlsx';
      $writer = WriterEntityFactory::createXLSXWriter();
      $writer->openToFile($filePath);
      $style = (new StyleBuilder())
        ->setFontBold()
        ->build();

      $headerRow = WriterEntityFactory::createRowFromArray(['ID','Title',	'Type',	'Author 1',
      	'Author 1 Institution',	'Author 2'	,'Author 2 Institution', 'Author 3',
        'Author 3 Institution','Author 4','Author 4 Institution'], $style);
      $writer->addRow($headerRow); 
   
                
   
    try{
      # Iterate over the paper cards
      foreach ($paper_card as $elemento) {
        # Iterate over the child nodes of the paper card 
        foreach ($elemento->childNodes as $node) {
          # Get the tag name of the child node
          $node_tagname = $node->tagName; 
          # If the tag name is 'h4', then it is the title of the paper
          if($node_tagname == 'h4'){
            # Print the title of the paper
            $title = $node->nodeValue;
            print_r("Titulo: $title \n");
          } 
          # If the tag name is 'div', then it is the title of the paper
          else if($node_tagname == 'div'){          
            $filhoNo = $node->childNodes;
            $count = 1;
            foreach ($filhoNo as $no){
              # If the tag name is 'div', then it is the title of the paper     
              if($no->nodeName == 'span'){
                $instituicao = $no->getAttribute('title');
                print_r("Instituição: $instituicao \n");    
                $autor = $no->textContent;
                print_r("Autores: $autor \n");
                if($count == 1){
                  $row = WriterEntityFactory::createRow(['','','',$autor,$instituicao]);
                }elseif($count == 2){
                  $row = WriterEntityFactory::createRowFromArray(['','','','','',$autor,$instituicao]);
                }elseif($count == 3){
                  $row = WriterEntityFactory::createRowFromArray(['','','','','','','',$autor,$instituicao]);
                }elseif($count == 4){
                  $row = WriterEntityFactory::createRowFromArray(['','','','','','','','','',$autor,$instituicao]);
                }
                $writer->addRow($row);
                $count++;
              }else if($no->nodeName == 'div'){
                if($no->getAttribute('class') == 'tags mr-sm'){
                  $type = $no->nodeValue;
                  print_r($type . "\n");
                }else{
                  $id = $no->nodeValue;
                  print_r($id . "\n");
                  $row = WriterEntityFactory::createRowFromArray([$id,$title,$type]);
                  $writer->addRow($row);
                }

              }
              
            }
            
          }
          
         
        } 
        
      } 
      /* 

      echo "Tabela criada com sucesso em $filePath \n" ; */

    }catch(\DOMException $e){
      print_r($e->getMessage());
     }
     $writer->close();
  }
  

     
        
        
}


