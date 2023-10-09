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
  public int $id;

  /**
   * Paper Title.
   *
   * @var string
   */
  public string $title;

  /**
   * The paper type (e.g. Poster, Nobel Prize, etc).
   *
   * @var string
   */
  public string $type;

  /**
   * Paper authors.
   *
   * @var Person[]
   */
  public mixed $authors;

  /**
   * Builder.
   */
  public function __construct($id, $title, $type, $authors = []) {
    $this->id = $id;
    $this->title = $title;
    $this->type = $type;
    $this->authors = $authors;
  }

  /**
   * Methods for return id
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Methods for return title
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Methods for return type
   */
  public function getType() {
    return $this->type;
  }

  /**
   * Methods for return authors
   */
  public function getAuthors() {
    return $this->authors;
  }

}
