<?php

namespace Chuva\Php\WebScrapping;


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
    // Write your logic to save the output file bellow.   
    # Create an XPath object
    $data = (new Scrapper())->scrap($dom);
    
  }  
}
    


         
      
  
    

      
    /* print_r($data);  */ 
 
?>