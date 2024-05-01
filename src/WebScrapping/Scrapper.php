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
    $xpath = new \DOMXPath($dom);

    $data = [];

    // Encontrar todos os elementos <a> com a classe "paper-card"
    $nodes = $xpath->query('//a[contains(@class, "paper-card")]');

    foreach ($nodes as $node) {
        // Extrair o ID do link
        $id = basename($node->getAttribute('href'));

        // Extrair o título
        $title = $node->getElementsByTagName('h4')->item(0)->nodeValue;

        // Extrair os autores e suas instituições
        $authors = [];
        $authorsElements = $node->getElementsByTagName('span');
        foreach ($authorsElements as $authorElement) {
            $author = $authorElement->nodeValue;
            $institution = $authorElement->getAttribute('title');
            $authors[] = [
                'name' => $author,
                'institution' => $institution,
            ];
        }

        // Extrair o tipo da apresentação
        $type = '';
        $tagsElements = $node->getElementsByTagName('div');
        foreach ($tagsElements as $tagElement) {
            if ($tagElement->getAttribute('class') === 'tags mr-sm') {
                $type = $tagElement->nodeValue;
                break;
            }
        }

        // Adicionar os dados ao array
        $data[] = [
            'id' => $id,
            'title' => $title,
            'type' => $type,
            'authors' => $authors,
        ];
    }

    return $data;
}


}
