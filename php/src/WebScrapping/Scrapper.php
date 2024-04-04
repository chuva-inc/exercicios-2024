<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Class responsible for scraping webpage data.
 */
class Scrapper {

  /**
   * Extracts paper information from the HTML and returns an array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    $papers = [];
    $xpath = new \DOMXPath($dom);
    $nodes = $xpath->query('//a[@class="paper-card p-lg bd-gradient-left"]');

    foreach ($nodes as $node) {
      $idNode = $xpath->query('.//div[@class="volume-info"]', $node)->item(0);
      $titleNode = $xpath->query('.//h4', $node)->item(0);
      $typeNode = $xpath->query('.//div[@class="tags mr-sm"]', $node)->item(0);
      $authorsNodes = $xpath->query('.//div[@class="authors"]/span', $node);
      $authors = $this->getAuthors($authorsNodes);

      $papers[] = new Paper(
        $idNode->nodeValue,
        $titleNode->nodeValue,
        $typeNode->nodeValue,
        $authors
      );
    }
    return $papers;
  }

  /**
   * Extracts author information from the HTML nodes and returns an array of Person objects.
   */
  private function getAuthors(\DOMNodeList $nodes): array {
    $authors = [];
    foreach ($nodes as $node) {
      $name = trim($node->nodeValue, ';'); // Remove the semicolon from the end of the name
      $title = $node->getAttribute('title');
      $authors[] = new Person($name, $title);
    }
    return $authors;
  }

}
