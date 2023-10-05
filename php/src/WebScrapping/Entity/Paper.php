<?php

namespace Chuva\Php\WebScrapping\Entity;

/**
 * Paper.
 */
class Paper {

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
  public $title;

  /**
   * Type.
   *
   * @var string
   */
  public $type;

  /**
   * Id.
   *
   * @var \Chuva\Php\WebScrapping\Entity\Person[]
   */
  public $authors;

  /**
   * Builder.
   */
  public function __construct($id, $title, $type, $authors = []) {
  }

}