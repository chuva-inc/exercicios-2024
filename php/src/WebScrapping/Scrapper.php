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
    $papers = [];

    // Extrair informações sobre os trabalhos (papers)
    $paperNodes = $dom->getElementsByTagName('div');
    foreach ($paperNodes as $paperNode) {
        $titleNode = $paperNode->getElementsByTagName('h5')->item(0);
        $title = $titleNode ? $titleNode->nodeValue : '';

        $typeNode = $paperNode->getElementsByTagName('p')->item(0);
        $type = $typeNode ? $typeNode->nodeValue : '';

        $authors = [];
        $authorsNode = $paperNode->getElementsByTagName('ul')->item(0);
        if ($authorsNode) {
            $authorNodes = $authorsNode->getElementsByTagName('li');
            foreach ($authorNodes as $authorNode) {
                $authorName = $authorNode->nodeValue;
                $authors[] = new Person($authorName, ''); // Instituição não disponível no HTML fornecido
            }
        }

        $papers[] = new Paper(count($papers) + 1, $title, $type, $authors);
    }

    return $papers;
  }
}
