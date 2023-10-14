<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Common\Entity\Row;
use Box\Spout\Common\Exception\IOException;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
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
    
     # Create empty lists to store the data
     $id = [];
     $title = [];
     $type = [];
     $autores = "";
     $instituicao = "";
    // Write your logic to save the output file bellow.   
    # Create an XPath object
    $xpath = new \DOMXPath($dom);

    # Query the HTML for the paper cards
    $paper_card = $xpath->query('.//a[@class="paper-card p-lg bd-gradient-left"]');
    # Query the HTML for the paper IDs
    $ID = $xpath->query('.//div[@class="volume-info"]');
    # Query the HTML for the paper types
    $TYPE =$xpath->query('.//div[@class="tags mr-sm"]');
           

                
    
    # Iterate over the paper types
    foreach ($TYPE as $currentType) {
      $type[] = $currentType->textContent;
      print_r("Tipo: " . $type[1] . "\n");
    }
    # Iterate over the paper IDs
    foreach ($ID as $currentId) {
      $id[] = $currentId->textContent;
      print_r("ID:" . $id[1] . "\n");
    } 
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
            foreach ($filhoNo as $no){
              print_r($no);
              $no_tagname = $no->tagName;
              # If the tag name is 'div', then it is the title of the paper
              if($no_tagname=='span'){
                if(($no->tagName)!=NULL) $instituicao = $no->getAttribute('title');
                print_r($instituicao . "\n");    
                $autores = $no->textContent;
                print_r("Autores: $autores \n");
                $person = new Person($autores, $instituicao);
              }else if($no_tagname==NULL){
                continue;
              }
            }
            
          }
          
      } 
      /* Função teste $paper = new Paper($id,$title,$type,)  */
    } 
    
  }  
}
    


         
      
  
    

      $filePath = 'exemplo.xlsx';
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

      echo "Tabela criada com sucesso em $filePath \n" ;
    /* print_r($data);  */ 
 
?>