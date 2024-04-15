<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

class Scrapper {
  
  //Loads paper information from the HTML and returns the array with the data.
  //return [new Paper(id,titulo,tipo,[new Pessoa(autorN,instN)])]
  public function scrap(\DOMDocument $dom): array {
    $papers = [];

        $links = $dom->getElementsByTagName('a'); //tentando fazer de forma q sempre que ache a tag <a href=...> identifique q é um novo paper
        foreach ($links as $link) {
            $paper = $this->parsePaperFromLink($link);
            if ($paper) {
                $papers[] = $paper;
            }
        }

        return $papers;
    }
}