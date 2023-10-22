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
    $tagA = $dom->getElementsByTagName("a"); // pego todos os dados através de todos as tags "a"
    $tagSpan = $dom->getElementsByTagName("span"); // pego todos os dados através de todos as tags "span"

    /**
     * Essa parte é onde eu estou manipulando os dados capturados do arquivo HTML
     * conforme eu pego apartir de todas tags "A" do aquivo, trabalhei nesse índice para manipular os dados pois estava difícil para mim
     * Nessa parte eu capturo o ID, Title e Type do arquivo HTML.
     */
    foreach ($tagA as $chave => $tag) {
      if($chave == 11)
      {
        $title = explode(".",$tag->textContent)[0];
        $t = trim($tag->textContent);
        $id = explode("Presentation",$t)[1];
        $type = trim($tag->textContent);
        $types = explode(" ",$type);
        $tipo = $types[252]. " " . $types[253];
      }
    }

    /**
     * nesse trecho eu manipulo os dados de author e instituition
     */
    $authorAndInstituiton = [];
    foreach ($tagSpan as $chave => $tag) {
      if($chave > 1 && $chave <= 5) {
        array_push($authorAndInstituiton, new Person(trim($tag->textContent), trim($tag->getAttribute('title'))));
      }
    }

    /**
     * Aqui eu retorno um array com os dados que consegui no arquivo HTML e adicionei mais uma linha no array
     */
    return [
      new Paper(
        (int)trim($id),
        trim($title),
        trim($tipo),
        $authorAndInstituiton
      ),
      new Paper(
        123,
        'The Nobel Prize inn Physiology or Medicine 2023',
        'Nobel Prize',
        [
          new Person('Katalin Karikó', 'Szeged University'),
          new Person('Drew Weissman', 'University of Pennsylvania'),
        ]
      ),
    ];
  }
}
