<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Get information from a card.
   */
  private function collectPaperCardData(\DOMXPath $xpath, \DOMElement $paperCard): Paper {
    $id = "";
    $title = "";
    $type = "";
    $authors = [];

    // Busca o título do "paper-card".
    $titleElement = $xpath->query(".//h4[contains(@class, 'paper-title')]", $paperCard)->item(0);
    if ($titleElement) {
      $title = $titleElement->textContent;
    }

    // Busca a div com a classe "authors".
    $authorsDiv = $xpath->query(".//div[contains(@class, 'authors')]", $paperCard)->item(0);

    // Verifica se a div de autores foi encontrada.
    if ($authorsDiv) {
      // Percorre os filhos da div de autores (os spans)
      foreach ($authorsDiv->childNodes as $authorElement) {
        // Verifica se o nó é um elemento do tipo "element".
        if ($authorElement->nodeType === XML_ELEMENT_NODE) {
          $institution = $authorElement->getAttribute("title");
          $author = $authorElement->textContent;

          $person = new Person($author, $institution);
          $authors[] = $person;
        }
      }
    }

    // Busca a div com a classe "volume-info".
    $volumeInfoDiv = $xpath->query(".//div[contains(@class, 'volume-info')]", $paperCard)->item(0);
    $id = $volumeInfoDiv->textContent;

    $typeElement = $xpath->query(".//div[contains(@class, 'tags mr-sm')]", $paperCard)->item(0);
    $type = $typeElement->textContent;

    $paper = new Paper($id, $title, $type, $authors);

    return $paper;
  }

  /**
   * Take all the cards with the information and return them.
   */
  private function collectPaperData(\DOMDocument $dom): array {
    $xpath = new \DOMXPath($dom);
    $paperCards = $xpath->query("//a[contains(@class, 'paper-card')]");

    $result = [];

    foreach ($paperCards as $paperCard) {
      $paperData = $this->collectPaperCardData($xpath, $paperCard);
      $result[] = $paperData;
    }

    return $result;
  }

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    return $this->collectPaperData($dom);
  }

}
