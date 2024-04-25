<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * The Paper class represents the row of the parsed data.
 */
class Paper {
  /**
   * Paper ID.
   *
   * @var int
   */
  public int $id;

  /**
   * Paper title.
   *
   * @var string
   */
  public string $title;

  /**
   * Paper type.
   *
   * @var string
   */
  public string $type;

  /**
   * Array of authors.
   *
   * @var \Chuva\Php\WebScrapping\Entity\Person[]
   */
  public $authors;

  /**
   * Paper constructor.
   *
   * @param int $id
   *   Paper ID must be a positive integer.
   * @param string $title
   *   Paper title is the title of the paper.
   * @param string $type
   *   Paper type the type of the paper.
   * @param array $authors
   *   Array of authors the authors of the paper.
   */
  public function __construct(int $id, string $title, string $type, array $authors = []) {
    // Constructor requires id, title, type, and authors.
    $this->id = $id;
    $this->title = $title;
    $this->type = $type;
    $this->authors = $authors;
  }

}
