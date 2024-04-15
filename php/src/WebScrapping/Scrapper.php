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
    
    // Find all the titles:
    $titles = $dom->getElementsByTagName('h4');

    $titles_array = array();

    foreach($titles as $title){
        $title_text = $title->textContent;
        $titles_array[] = $title_text;
    }

    $titles_array = array_slice($titles_array, 4); //
    array_pop($titles_array);

    echo 'Titulos: <br><br>';
    print_r($titles_array);
    echo '<br><br><br><br>';

  }

}
