<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * The Paper class represents the row of the parsed data.
 */
class Paper {

  /**
   * Paper Id.
   *
   * @var int
   */
  private $id;

  /**
   * Paper Title.
   *
   * @var string
   */
  private $title;

  /**
   * The paper type (e.g. Poster, Nobel Prize, etc).
   *
   * @var string
   */
  private $type;

  /**
   * Paper authors.
   *
   * @var \Chuva\Php\WebScrapping\Entity\Person[]
   */
  private $authors;

  /**
   * Builder.
   */

  // Add the missing getters and setters
  public function getId() {
    return $this->id;
  }
  public function setTitle($title) {
    $this->title = $title;
  }
  public function getTitle() {
    return $this->title;
  }
  public function setType($type) {
    $this->type = $type;
  }
  public function getType() {
    return $this->type;
  }
  public function setAuthors($authors) {
    $this->authors = $authors;
  }
  public function getAuthors() {
    return $this->authors;
  }

  public function __construct($id, $title, $type, $authors = []) {
    $this->getId = $id;
    $this->title = $title;
    $this->type = $type;
    $this->authors = $authors;
  }

}
