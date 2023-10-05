<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * Person.
 */
class Person {

  public string $name;

  public string $institution;

  /**
   * Builder.
   */
  public function __construct($name, $institution) {
    $this->name = $name;
    $this->institution = $institution;
  }

}