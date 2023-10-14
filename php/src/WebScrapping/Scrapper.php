<?php

namespace Chuva\Php\WebScrapping;

require __DIR__ . '/Entity/Paper.php';
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
  
      // Find all <div> elements with class "volume-info" to get the ids
      $divElements = $dom->getElementsByTagName('div');
      $ids = [];
  
      foreach ($divElements as $div) {
        if ($div->getAttribute('class') === 'volume-info') {
          $ids[] = $div->textContent;
        }
      }
  
      // Find all <h4> elements with class "my-xs paper-title" to get the titles
      $h4Elements = $dom->getElementsByTagName('h4');
      $titles = [];
  
      foreach ($h4Elements as $h4) {
        if ($h4->getAttribute('class') === 'my-xs paper-title') {
          $titles[] = $h4->textContent;
        }
      }
  
      // Find the ul element with the "list-unstyled" class to get the types
      $divElements = $dom->getElementsByTagName('div');
      $types = [];
  
      foreach ($divElements as $div) {
        if ($div->getAttribute('class') === 'tags mr-sm') {
          $types[] = $div->textContent;
        }
      }
  
      // Find the <div> elements with the "authors" class to get the names of the authors and their institutions
      $authorElements = $dom->getElementsByTagName('div');
      $authors = [];
  
      foreach ($authorElements as $authorElement) {
        if ($authorElement->getAttribute('class') === 'authors') {
          $spanElements = $authorElement->getElementsByTagName('span');
          $authorData = [];
  
          foreach ($spanElements as $spanElement) {
            $authorName = str_replace(';', '', $spanElement->textContent);
            $institution = $spanElement->getAttribute('title');
            $author = new Person($authorName, $institution);
            $authorData[] = $author;
          }
  
          $authors[] = $authorData;
        }
      }
  
      // Create Paper objects with the collected information
      foreach ($ids as $key => $id) {
        $papers[] = new Paper($id, $titles[$key], $types[$key], $authors[$key]);
      }
  
      return $papers;
    }
  }
   