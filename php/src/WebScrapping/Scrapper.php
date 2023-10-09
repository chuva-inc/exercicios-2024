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

    /**
     * Query and extract text content with XPath.
     *
     * @var / $xpath
     */
    $xpath = new \DOMXPath($dom);
    $all_ids = $xpath->query('//div[@class="volume-info"]');
    $all_titles = $xpath->query('//h4[@class="my-xs paper-title"]');
    $all_types = $xpath->query('//div[@class="tags mr-sm"]');
    $all_div_authors = $xpath->query('//div[@class="authors"]');

    // Iterating elements and return data.
    $data = [];

    for ($i = 0; $i < $all_ids->length; $i++) {

      $id = $all_ids->item($i)->textContent;
      $title = $all_titles->item($i)->textContent;
      $type = $all_types->item($i)->textContent;
      $authorSpans = $xpath->query('.//span', $all_div_authors->item($i));

      // Iterating spans and assign authors.
      $authors = [];
      foreach ($authorSpans as $authorSpan) {
        $authorName = $authorSpan->textContent;
        $authorInstitution = $authorSpan->getAttribute("title");
        $authors[] = new Person($authorName, $authorInstitution);
      }

      $paper = new Paper($id, $title, $type, $authors);
      $data[] = $paper;
    }

    return $data;
  }

}
