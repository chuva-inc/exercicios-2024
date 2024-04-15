<?php

namespace Chuva\Php\WebScrapping\Entity;

//The Paper class represents the row of the parsed data.

class Paper {
 public int $id;
 public string $title;
 public string $type;
 /**
 * @var \Chuva\Php\WebScrapping\Entity\Person[] //vetor de onde vem $authors
 */
 public $authors;
 

  public function __construct($id, $title, $type, $authors = []) { //construtor pede id, titulo, tipo e autores[];
    $this->id = $id;
    $this->title = $title;
    $this->type = $type;
    $this->authors = $authors;
  }

}