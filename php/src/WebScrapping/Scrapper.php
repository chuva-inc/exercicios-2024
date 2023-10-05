<?php

namespace Chuva\Php\WebScrapping;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    return [$dom->saveHTML()];
  }

}
