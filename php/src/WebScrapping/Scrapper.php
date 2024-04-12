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

    $dom_anchors = $dom->getElementsByTagName("a");

    $papers = [];
    foreach ($dom_anchors as $anchor) {
      if ($anchor->getAttribute("class") == "paper-card p-lg bd-gradient-left") {
        $base_node = $anchor;

        $paper_title = $base_node->getElementsByTagName("h4")[0]->textContent;

        $authors = $base_node->getElementsByTagName("div")[0]->getElementsByTagName("span");

        $paper_authors = [];
        foreach ($authors as $author) {
          $author_institutions = $author->getAttribute("title");

          if ($author_institutions != '') {
            $formatted_name = preg_replace(['/\s{2,}/'], ' ', $author->textContent);
            $formatted_name = trim($formatted_name, ' ;');
            $formatted_name = ucwords(strtolower($formatted_name));

            $author_name = $formatted_name;
            $paper_authors[] = new Person($author_name, $author_institutions);
          }
        }

        $paper_infos = $base_node->getElementsByTagName("div")[1]->getElementsByTagName("div");

        $paper_type = $paper_infos[0]->textContent;
        $paper_id = $paper_infos[1]->getElementsByTagName("div")[1]->textContent;

        $papers[] = new Paper($paper_id, $paper_title, $paper_type, $paper_authors);
      }
    }

    return $papers;
  }

}
