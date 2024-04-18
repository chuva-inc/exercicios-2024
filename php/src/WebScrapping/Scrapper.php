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
    $titlesQuery = $xpath->query('//h4[@class="my-xs paper-title"]');
    
    // Iteração sobre os resultados
    for ($i = 0; $i < $idsQuery->length; $i++) {
      // Obtenção de valores
      $id = $idsQuery->item($i)->textContent;
      $type = $typesQuery->item($i)->textContent;
      $title = $titlesQuery->item($i)->textContent;
      $authorNames = $xpath->query('.//span', $xpath->query('//div[@class="authors"]')->item($i));
      
      // Array para armazenar os nomes dos autores
      $articleAuthors = [];
      foreach ($authorNames as $authorName) {
        $author = $authorName->textContent;
        $authorInstitution = $authorName->getAttribute("title");
        $articleAuthors[] = new Person($author, $authorInstitution);
      }
      
      // Criação de um objeto Paper e armazenamento no array $data
      $articleData = new Paper($id, $title, $type, $articleAuthors);
      $data[] = $articleData;
    }

    // Retorno do array contendo os objetos Paper
    return $data;


  }
}
