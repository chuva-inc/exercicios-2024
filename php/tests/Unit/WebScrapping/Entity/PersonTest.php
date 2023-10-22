<?php

namespace Chuva\Tests\Unit\WebScrapping\WebScrapping\Entity;

use Chuva\Php\WebScrapping\Entity\Person;
use PHPUnit\Framework\TestCase;
// require_once 'php/vendor/autoload.php';

/**
 * Tests requirements for Person.
 */
class PersonTest extends TestCase {

  /**
   * Tests construct().
   */
  public function testConstruct() {
    $person = new Person('Name', 'Institution');

    $this->assertEquals('Name', $person->name);
    $this->assertEquals('Institution', $person->institution);
  }

  /**
   * Tests construct() with empty institution.
   */
  public function testConstructNoInstitution() {
    $person = new Person('Name', '');

    $this->assertEquals('Name', $person->name);
    $this->assertEquals('', $person->institution);
  }

}