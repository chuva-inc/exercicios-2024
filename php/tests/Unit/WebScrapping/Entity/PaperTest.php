<?php

namespace Chuva\Tests\Unit\WebScrapping\WebScrapping\Entity;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use PHPUnit\Framework\TestCase;
// require_once 'php/vendor/autoload.php';

/**
 * Tests requirements for Paper.
 */
class PaperTest extends TestCase {

  /**
   * Tests construct().
   */
  public function testConstruct() {
    $paper = new Paper(3030, 'jonathan luis', 'Honore tournieux', [
      new Person('x6', 'drycka'),
    ]);

    $this->assertEquals(3030, $paper->id);
    $this->assertEquals('jonathan luis', $paper->title);
    $this->assertEquals('Honore tournieux', $paper->type);
    $this->assertEquals('x6', $paper->authors[0]->name);
    $this->assertEquals('drycka', $paper->authors[0]->institution);
  }

}