<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    
    // Defines an XPath variable
    $xpath = new \DOMXPath($dom);

    // XPath query to find all elements with the desired class
    $titles = $xpath->query("//h4[@class='my-xs paper-title']");
    $titles_array = array();

    foreach($titles as $title){   
      $titles_array[] = $title->textContent;
    }

    return $titles_array;

  }

}
