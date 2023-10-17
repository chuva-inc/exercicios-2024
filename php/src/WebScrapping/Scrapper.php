<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use Box\Spout\Common\Entity\Row;
use Box\Spout\Common\Exception\IOException;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;


/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    $xpath = new \DOMXPath($dom);

    # Query the HTML for the paper cards
    $paper_card = $xpath->query('.//a[@class="paper-card p-lg bd-gradient-left"]');
           

                
   
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
              foreach ($filhoNo as $no){
                # If the tag name is 'div', then it is the title of the paper     
                if($no->tagName=='span'){
                  $instituicao = $no->getAttribute('title');
                  print_r("Instituição: $instituicao \n");    
                  $autor = $no->textContent;
                  print_r("Autores: $autor \n");
                  $person[] = new Person($autor, $instituicao);
                }else if($no->tagName=='div'){
                  if($no->getAttribute('class')=='tags mr-sm'){
                    $type = $no->nodeValue;
                    print_r($type . "\n");
                  }else {
                    $id = $no->nodeValue;
                    print_r($id . "\n");
                  }
  
                }
                
              }
              
            }
        
         
        } 
        $paper = new Paper($id,$title,$type,[$person]);
        print_r($paper);
        
      } 
    

    }catch(\DOMException){
      print("Erro");
    }
    
  }
  /**
   * Summary of printTable
   * @param mixed $id
   * @param mixed $title
   * @param mixed $type
   * @param mixed $autor
   * @param mixed $instituicao
   * @return void
   */
  function printTable($id,$title,$type,$autor,$instituicao){
        $filePath = 'exemplo.xlsx';
        $reader = ReaderFactory::create(ReaderFactory::TYPE_XLSX);
        $reader->open($filePath);
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile($filePath);

        $style = (new StyleBuilder())
          ->setFontBold()
          ->build();

        $headerRow = WriterEntityFactory::createRowFromArray(['ID','Title',	'Type',	'Author 1',	'Author 1 Institution',	'Author 2'	,'Author 2 Institution', 'Author 3','Author 3','Author 3 Institution'], $style);
        $writer->addRow($headerRow); 
        

        $reader->each(function($row) use ($writer) {

          $guid = $row[4]; // Assuma que o GUID está na coluna 5 (índice 4)
      
          if ($guid !== '') {
      
              // O GUID já existe, a cédula já foi escrita antes
      
              echo "Cédula já escrita.\n";
      
          } else {
      
              // Gere um novo GUID e escreva na cédula
      
              $newGuid = uniqid();
      
              $writer->addRow([
      
                  $row[0],
      
                  $row[1],
      
                  $row[2],
      
                  $row[3],
      
                  $newGuid,
      
              ]);
      
          }
      
      });
      
      
      // Feche o leitor e o escritor
      
      $reader->close();
        $teste = WriterEntityFactory::createRowFromArray([$id,$title,$type,$autor,$instituicao], $style);
        $writer->addRow($teste);
        $writer->close();

        echo "Tabela criada com sucesso em $filePath \n" ;
  }

}
