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
    
    // Crie um objeto DOMXPath para consulta
    $xpath = new \DOMXPath($dom);

    // Consulta XPath para obter os elementos que contêm atributos de papers e de person
    $idsQuery = $xpath->query('//div[@class="volume-info"]');
    $typesQuery = $xpath->query('//div[@class="tags mr-sm"]');
    $authorsQuery = $xpath->query('//div[@class="authors"]//span');
    $titlesQuery = $xpath->query('//h4[@class="my-xs paper-title"]');
    
}
