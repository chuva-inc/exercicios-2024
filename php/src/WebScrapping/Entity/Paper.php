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
  public array $authors;

  /**
   * Builder.
   */
  public function __construct($id, $title, $type, $authors = []) {
      $this->id = $id;
      $this->title = $title;
      $this->type = $type;
      $this->authors = $authors;
  }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAuthors(): array
    {
        return $this->authors;
    }

}
