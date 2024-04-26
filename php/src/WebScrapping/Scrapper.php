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

    // Defines an XPath variable to find all elements with the desired class:
    $xpath = new \DOMXPath($dom);

    // Loads information about all titles, paper types, ids and authors:
    $titles = $xpath->query("//h4[@class='my-xs paper-title']");
    $types = $xpath->query('//div[contains(@class, "tags mr-sm")]');
    $ids = $xpath->query('//div[contains(@class, "volume-info")]');
    $authors = $xpath->query('//div[contains(@class, "authors")]');

    $titles_array = [];
    $types_array = [];
    $ids_array = [];
    $authors_array = [];

    for ($i = 0; $i < $ids->length; $i++) {
      $titles_array[] = $titles[$i]->textContent;
      $types_array[] = $types[$i]->textContent;
      $ids_array[] = $ids[$i]->textContent;
      $authors_array[] = $authors[$i]->textContent;
    }

    // Loads information about authors and inserts into the Person class:
    $spanElements = $xpath->query('//div[@class="authors"]/span');
    $persons = [];
    foreach ($spanElements as $span) {
      // Gets the span title:
      $institution = $span->getAttribute('title');
      // Gets the content of the span:
      $author = $span->textContent;
      $author = str_replace(";", "", $author);
      // Add data to the Person class:
      $persons[] = new Person($author, $institution);
    }

    // Instantiates the data within the Paper class:
    $papers = [];
    for ($i = 0; $i < count($ids_array); $i++) {
      $id = $ids_array[$i];
      $title = $titles_array[$i];
      $type = $types_array[$i];
      $authors = explode('; ', $authors_array[$i]);
      // Remove the last element from the array - empty string:
      array_pop($authors);

      $paper_authors = [];

      foreach ($authors as $author) {
        foreach ($persons as $person) {
          if ($author == $person->name) {
            $paper_authors[] = $person;
            break;
          }
        }
      }

      $papers[] = new Paper($id, $title, $type, $paper_authors);
    }

    return $papers;
  }

}
