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
    $paper = new Paper(12345, 'jonathan Luis', 'rr', [
      new Person('ss', 'vv'),
    ]);

    $this->assertEquals(12345, $paper->id);
    $this->assertEquals('jonathan Luis', $paper->title);
    $this->assertEquals('rr', $paper->type);
    $this->assertEquals('ss', $paper->authors[0]->name);
    $this->assertEquals('vv', $paper->authors[0]->institution);
  }

}