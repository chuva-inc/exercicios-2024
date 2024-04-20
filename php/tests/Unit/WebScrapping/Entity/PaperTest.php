<?php

namespace Chuva\Tests\Unit\WebScrapping\WebScrapping\Entity;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use PHPUnit\Framework\TestCase;

/**
 * Tests requirements for Paper.
 */
class PaperTest extends TestCase {

  /**
   * Tests construct().
   */
  public function testConstruct() {
    $paper = new Paper(123, 'Paper title', 'Oral presentation', [
      new Person('Evariste Galois', 'Lycée Louis-le-Grand'),
    ]);

    $this->assertEquals(123, $paper->id);
    $this->assertEquals('Paper title', $paper->title);
    $this->assertEquals('Oral presentation', $paper->type);
    $this->assertEquals('Evariste Galois', $paper->authors[0]->name);
    $this->assertEquals('Lycée Louis-le-Grand', $paper->authors[0]->institution);
  }

}