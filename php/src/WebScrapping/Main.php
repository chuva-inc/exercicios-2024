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
    // Write your logic to save the output file bellow.
    $data = (new Scrapper())->scrap($dom);
    print_r($data);
  }

}
