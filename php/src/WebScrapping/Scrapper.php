<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Class Scrapper calls webscrapping function.
 */
class Scrapper {

  /**
   * Loads info & return new Paper(id,titulo,tipo,new Pessoa(autorN,instN)).
   *
   * @param \DOMDocument $dom
   *   //Param comment to correct error.
   *
   * @return array
   *   //Adding description so it corrects error on PHPlint.
   */
  public function scrap(\DOMDocument $dom): array {
    $xpath = new \DOMXPath($dom);
    // Defining XPath paths for the elements we want to extract.
    $paperXPath = "//a[@class='paper-card p-lg bd-gradient-left']";
    $titleXPath = ".//h4[@class='my-xs paper-title']";
    $typeXPath = ".//div[@class='tags mr-sm']";
    $idXPath = ".//div[@class='volume-info']";
    $authorXPath = ".//div[@class='authors']/span";

    // Gathering data of each paper into a single variable $paperNodes.
    $papersNodes = $xpath->query($paperXPath);

    // Creating an array to store the papers.
    $papers = [];

    // Using foreach to iterate through all papers.
    foreach ($papersNodes as $paperNode) {
      $title = $xpath->query($titleXPath, $paperNode)->item(0)->nodeValue;
      $type = $xpath->query($typeXPath, $paperNode)->item(0)->nodeValue;
      $id = $xpath->query($idXPath, $paperNode)->item(0)->nodeValue;

      // Initializes array to store authors' info.
      $authors = [];

      // Extracting authors' information from each paper.
      $authorsNodes = $xpath->query($authorXPath, $paperNode);
      foreach ($authorsNodes as $authorNode) {
        // Reading correct content for the author being instantiated.
        $author = $authorNode->nodeValue;
        // Also reading the correct content of the institution of this author.
        $institution = $authorNode->getAttribute('title');
        // Assigning these read values to this author's instance.
        $authors[] = new Person($author, $institution);
      }

      // Instantiating Paper class with the extracted data and authors.
      $paper = new Paper($id, $title, $type, $authors);
      // Passing all information from the associative array to the papers array.
      $papers[] = $paper;
    }

    // Returns all information of all papers.
    return $papers;
  }

}
