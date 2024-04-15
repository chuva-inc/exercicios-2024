<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * Paper Author personal information.
 */
class Person {

  /**
   * Person name.
   */
  public string $name;

  /**
   * Person institution.
   */
  public string $institution;

  /**
   * Builder.
   */
  public function __construct($name, $institution) {
    $this->name = $name;
    $this->institution = $institution;
     /**
   * Fill person data from HTML.
   *
   * @param string $html The HTML content.
   * @return void
   */
  public function fillFromHtml($html) {
    // Não é necessário para a classe Person, pois o nome do autor já está disponível diretamente no HTML
  }
}
