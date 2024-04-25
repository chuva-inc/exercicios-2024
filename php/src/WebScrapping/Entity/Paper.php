<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * The Paper class represents the row of the parsed data.
 */
class Paper {
    public int $id;
    public string $title;
    public string $type;

    /**
     * @var \Chuva\Php\WebScrapping\Entity\Person[] Vetor de onde vem authors
     */
    public $authors;

    /**
     * Paper constructor.
     *
     * @param int     $id      Paper ID
     * @param string  $title   Paper title
     * @param string  $type    Paper type
     * @param array   $authors Array of authors
     */
    public function __construct(int $id, string $title, string $type, array $authors = []) {
      // Constructor pede id, title, type, e authors
      $this->id = $id;
      $this->title = $title;
      $this->type = $type;
      $this->authors = $authors;
  }
}
 