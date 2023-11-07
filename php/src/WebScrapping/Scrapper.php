<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use DOMXPath;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  private function collectPaperCardData(\DOMXPath $xpath, \DOMElement $paperCard): Paper {
    $id = "";
    $title = "";
    $type = "";
    $authors = [];

    // Busque o título do "paper-card"
    $titleElement = $xpath->query(".//h4[contains(@class, 'paper-title')]", $paperCard)->item(0);
    if ($titleElement) {
        $title = $titleElement->textContent;
    }

    // Busque a div com a classe "authors"
    $authorsDiv = $xpath->query(".//div[contains(@class, 'authors')]", $paperCard)->item(0);

    // Verifique se a div de autores foi encontrada
    if ($authorsDiv) {
        // Percorra os filhos da div de autores (os spans) para obter os autores e suas instituições
        foreach ($authorsDiv->childNodes as $authorElement) {
            // Verifique se o nó é um elemento do tipo "element" (ignorando texto e outros nós)
            if ($authorElement->nodeType === XML_ELEMENT_NODE) {
                $institution = $authorElement->getAttribute("title");
                $author = $authorElement->textContent;

                $person = new Person($author, $institution);
                $authors[] = $person;
            }
        }
    }

    // Busque a div com a classe "volume-info"
    $volumeInfoDiv = $xpath->query(".//div[contains(@class, 'volume-info')]", $paperCard)->item(0);
    $id = $volumeInfoDiv->textContent;

    $typeElement = $xpath->query(".//div[contains(@class, 'tags mr-sm')]", $paperCard)->item(0);
    $type = $typeElement->textContent;

    $paper = new Paper($id, $title, $type, $authors);

    return $paper;
  }

  private function collectPaperData(\DOMDocument $dom): array {
    $xpath = new DOMXPath($dom);
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
