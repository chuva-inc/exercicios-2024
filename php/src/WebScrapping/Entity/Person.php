<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * Represents a person entity.
 */
class Person {
  /**
   * Name of the person.
   *
   * @var string
   */
  public string $name;

  /**
   * Institution of the person.
   *
   * @var string
   */
  public string $institution;

  /**
   * Person constructor.
   *
   * @param string $name
   *    Name of the person.
   * @param string $institution
   *    Institution of the person.
   */
  public function __construct(string $name, string $institution) {
    $this->name = $name;
    $this->institution = $institution;
  }
  
}