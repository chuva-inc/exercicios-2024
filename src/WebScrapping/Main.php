<?php

namespace Galoa\ExerciciosPhp2022\WebScrapping;

use DOMDocument;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../webscrapping/origin.html');
    (new Scrapper())->scrap($dom);
  }

}
