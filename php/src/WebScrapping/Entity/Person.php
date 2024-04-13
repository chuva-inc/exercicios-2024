<?php

namespace Chuva\Php\WebScrapping\Entity;

class Person {

public string $name;
public string $institution;

//construtor recebe nome e instituicao do autor
public function __construct($name, $institution) {
    $this->name = $name;
    $this->institution = $institution;
  }

}
