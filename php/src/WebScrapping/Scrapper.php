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
        foreach ($links as $link) { //cada tag (q é novo paper) ficara salva como elemnto no vetor links.. 
            $paper = $this->parsePaperFromLink($link); //aqui estou chamando uma outra funçao que vai preencher o construtor do paper com as informações q tão dentro de cada elemento link do vetor links...
            if ($paper) {
                $papers[] = $paper; //se paper existir (oq sabemos q sim) ele preenche o elemento do vetor com os dados do $paper instanciado
            }
        }

        return $papers;
    }

    private function parsePaperFromLink(\DOMElement $link): ?Paper {

    }
}