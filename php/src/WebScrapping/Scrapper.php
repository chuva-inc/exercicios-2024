<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use DOMXPath;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper
{

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array
  {
    $xpath = new DOMXPath($dom);
    $elements = $xpath->query('//a[contains(@class, "paper-card")]');

    $papers = [];
    foreach ($elements as $element) {

      // Output the text content of each element
      $h4Element = $xpath->query('h4', $element)->item(0);
      $authorsClassElement = $xpath->query('div[@class="authors"]', $element)->item(0);
      $type = $xpath->query('div/div', $element);

      $authorsElements = $xpath->query('span', $authorsClassElement);
      $authorsEl = [];

      foreach ($authorsElements as $author) {
        $authorsEl[] = new Person($author->textContent, $author->getAttribute('title'));
      }

      $papers[] = new Paper(
        $type->item(1)->textContent,
        $h4Element->textContent,
        $type->item(0)->textContent,
        $authorsEl
      );
    }

    return $papers;
  }
}
