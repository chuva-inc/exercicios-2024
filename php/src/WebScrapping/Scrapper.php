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

    // Seleciona todas as divs com a classe específica
    $paperDivs = $dom->getElementsByTagName('div');
    foreach ($paperDivs as $paperDiv) {
      // Verifica se a div possui a classe específica
      if ($paperDiv->getAttribute('class') === 'col-sm-12 col-md-8 col-lg-8 col-md-pull-4 col-lg-pull-4') {
        // Extrai os trabalhos dentro desta div
        $paperCards = $paperDiv->getElementsByTagName('a');
        foreach ($paperCards as $paperCard) {
          // Extrai o título do trabalho
          $title = '';
          $titleElement = $paperCard->getElementsByTagName('h4')->item(0);
          // var_dump($titleElement[0]);
          if ($titleElement !== null) {
            $title = $titleElement->nodeValue;
            // var_dump($title);
          }

          // Extrai os autores do trabalho
          $authors = [];
          $authorsElement = $paperCard->getElementsByTagName('div')->item(0);
          if ($authorsElement !== null) {
            $authorsSpans = $authorsElement->getElementsByTagName('span');
            foreach ($authorsSpans as $authorSpan) {
              $authors[] = $authorSpan->nodeValue;
              //var_dump($authors);
            }
          }
          
          // Extrai o tipo do trabalho
          $type = '';
          $typeElements = $paperCard->getElementsByTagName('div');
          foreach ($typeElements as $typeElement) {
            if ($typeElement->getAttribute('class') === 'tags mr-sm') {
              $type = $typeElement->nodeValue;
              // var_dump($type);
              break;
            }
          }

          // var_dump($title);
          // var_dump($authors);
          // var_dump($type);

          

          // Cria um objeto Paper e adiciona ao array de papers
          $papers[] = new Paper(
            count($papers) + 1, // ID do trabalho
            $title, // Título do trabalho
            $type, // Tipo do trabalho (preencher com o tipo correto)
            $authors // Autores do trabalho
          );
          //  var_dump($papers);
        }
      }
    }

    return $papers;
  }

}
