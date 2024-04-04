<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * Paper Author personal information.
 */
class Person {

  /**
   * Person name.
   */
  private string $name;

  /**
   * Person institution.
   */
  private string $institution;

  /**
   * Builder.
   */

  // Add the missing getters and setters
  public function getName() {
    return $this->name;
  }
  public function setName(string $name) {
    $this->name = $name;
  }
  public function getInstitution() {
    return $this->institution;
  }
  public function setInstitution(string $institution) {
    $this->institution = $institution;
  }
  
  public function __construct($name, $institution) {
    $this->name = $name;
    $this->institution = $institution;
  }

}
