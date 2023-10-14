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
    
    $id[]="";
    $title[]="";
    $type[]="";
    $autores="";
    $instituicao="";
    // Write your logic to save the output file bellow.   
    $xpath = new \DOMXPath($dom);


    $paper_card = $xpath->query('.//a[@class="paper-card p-lg bd-gradient-left"]');
    $ID = $xpath->query('.//div[@class="volume-info"]');
    $TYPE =$xpath->query('.//div[@class="tags mr-sm"]');
           

                
    
    
    foreach ($TYPE as $currentType) {
      $type[] = $currentType->textContent;
      print_r("Tipo: " . $type[1] . "\n");
    }
    foreach ($ID as $currentId) {
      $id[] = $currentId->textContent;
      print_r("ID:" . $id[1] . "\n");
    } 
    foreach ($paper_card as $elemento) { 
      foreach ($elemento->childNodes as $node) {
        $node_tagname = $node->tagName; 
          if($node_tagname == 'h4'){
            print_r($node);
            $title = $node->nodeValue;
            print_r("Titulo: $title \n");
          } 
          else if($node_tagname == 'div'){          
            $filhoNo = $node->childNodes;
            foreach ($filhoNo as $no){
              print_r($no);
              $no_tagname = $no->tagName;
              if($no_tagname=='span'){
                if(($no->tagName)!=null) $instituicao = $no->getAttribute('title');
                print_r($instituicao . "\n");    
                $autores = $no->textContent;
                print_r("Autores: $autores \n");
                $person = new Person($autores, $instituicao);
              }else if($no_tagname==null){
                continue;
              }
            }
            
          }
          
      } 
      /* $paper = new Paper($id,$title,$type,)  */
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