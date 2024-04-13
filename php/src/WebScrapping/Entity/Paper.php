<?php

namespace Chuva\Php\WebScrapping\Entity;

//The Paper class represents the row of the parsed data.

class Paper {
 public $id; //int
 public $title; //string
 public $type; //string
 public $authors; // \Chuva\Php\WebScrapping\Entity\Person[] essa variavel vem desse vetor.

  public function __construct($id, $title, $type, $authors = []) { //construtor pede id, titulo, tipo e autores[];
  }

}