<?php

namespace Chuva\Php\WebScrapping;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
   public static function run(): void {
  //   $dom = new \DOMDocument('1.0', 'utf-8');
  //   $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

  //   $data = (new Scrapper())->scrap($dom);

  //   // Write your logic to save the output file bellow.
  $dom = new \DOMDocument('1.0', 'utf-8');
  $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

  $xpath = new \DomXPath($dom);
  $nodeList = $xpath->query("//a']");
  $node = $nodeList->item(0);
  $conteudoDascaixas = $node->nodeValue;


  foreach ($nodelist as $conteudoDascaixas){
    $href = $xpath->query('//a', $n)->item(0)->getAttribute('href');
    $a_text = $xpath->query("//h4[@class='paper-title']", $n)->item(0)->nodeValue;
    $div_text = $xpath->query('h4', $n)->item(0)->nodeValue;}

  print("\n\n\n\n\n\n\n\n");
  print_r($conteudoDascaixas);
  print("\n\n\n\n\n\n\n\n");
    
  //   print_r($data);
  
  }

}
