<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * Paper interface.
 */
class PaperInterface {

  /**
   * Id.
   *
   * @var int
   */
  public $id;

  /**
   * Title.
   *
   * @var string
   */
  public string $title;

  /**
   * Type.
   *
   * @var string
   */
  public string $type;

  /**
   * Id.
   *
   * @var Chuva\Php\WebScrapping\Entity\AuthorInterface[]
   */
  public array $authors;

}