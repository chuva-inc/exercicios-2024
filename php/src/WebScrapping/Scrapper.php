<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

class Scrapper {
  
  //Loads paper information from the HTML and returns the array with the data.
  //return [new Paper(id,titulo,tipo,[new Pessoa(autorN,instN)])]
  public function scrap(\DOMDocument $dom): array {
    return [
        new Paper(
            123,
            'titulo artigo',
            'tipo', 
            [
                new Person('autor1', 'inst1'),
                new Person('autor2', 'inst2')
            ]
        )
    ];
}
}
