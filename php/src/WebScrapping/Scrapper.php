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

    // Loads information about all paper types
    $types = $xpath->query('//div[contains(@class, "tags mr-sm")]');
    $types_array = array();

    foreach($types as $type){
      $types_array[] = $type->textContent;
    }

    // Loads information about all ids
    $ids = $xpath->query('//div[contains(@class, "volume-info")]');
    $ids_array = array();

    foreach($ids as $id){
      $ids_array[] = $id->textContent;
    }

    // Loads information about authors and institutions and inserts into the Person class
    $spanElements = $xpath->query('//div[@class="authors"]/span');

    $persons = array();

    foreach ($spanElements as $span) {
      // Gets the span title
      $institution = $span->getAttribute('title');
    
      // Gets the content of the span
      $author = $span->textContent;
      $author = str_replace(";", "", $author);

      // Add data to the Person class
      $persons[] = new Person($author, $institution);
    }

    // Loads information about all authors who wrote a given paper:
    $authors = $xpath->query('//div[contains(@class, "authors")]');
    $authors_array = array();
    
    foreach($authors as $author){
      $authors_array[] = $author->textContent;
    }


  }

}
