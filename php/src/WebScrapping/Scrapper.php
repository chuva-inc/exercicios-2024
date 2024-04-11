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
      // Procurando a classe específica para resgatar os dados
      if ($paperDiv->getAttribute('class') === 'col-sm-12 col-md-8 col-lg-8 col-md-pull-4 col-lg-pull-4') {
        // Extrai os trabalhos dentro desta div
        $paperCards = $paperDiv->getElementsByTagName('a');
        foreach ($paperCards as $paperCard) {
          // Extrai o id
          $id = '';
          $elements = $paperCard->getElementsByTagName('div');
          foreach ($elements as $element) {
            if ($element->getAttribute('class') === 'volume-info') {
              $id = $element->nodeValue;
              break;
            }
          }

          // Extrai o título do trabalho
          $title = '';
          $titleElement = $paperCard->getElementsByTagName('h4')->item(0);
          if ($titleElement !== null) {
            $title = $titleElement->nodeValue;
          }

          // Extrai o tipo do trabalho
          $type = '';
          $typeElements = $paperCard->getElementsByTagName('div');
          foreach ($typeElements as $typeElement) {
            if ($typeElement->getAttribute('class') === 'tags mr-sm') {
              $type = $typeElement->nodeValue;
              break;
            }
          }

          // Extrai os autores do trabalho
          $authors = [];
          $authorsElement = $paperCard->getElementsByTagName('div')->item(0);
          if ($authorsElement !== null) {
            $authorsSpans = $authorsElement->getElementsByTagName('span');
            foreach ($authorsSpans as $authorSpan) {
              $name = $authorSpan->nodeValue;
              $institution = $authorSpan->getAttribute('title');
              $authors[] = new Person($name, $institution);
            }
          }
    
          // Cria um objeto Paper e adiciona ao array de papers
          $papers[] = new Paper(
            $id,
            $title, 
            $type, 
            $authors 
          );
        }
      }
    }
    return $papers;
  }

}
