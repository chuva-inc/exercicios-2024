<?php

namespace Chuva\Tests\Unit\WebScrapping\WebScrapping;

use Chuva\Php\WebScrapping\Scrapper;
use PHPUnit\Framework\TestCase;

/**
 * Tests requirements for Scrapper.
 */
class ScrapperTest extends TestCase {

  /**
   * Tests scrap count.
   */
  public function testScrapSignature() {
    $dom = new \DOMDocument('1.0', 'utf-8');
    @$dom->loadHTML('<html><body><p>Chove Chuva</p></body></html>');

    $scrapper = new Scrapper();
    $results = $scrapper->scrap($dom);

    $this->assertIsArray($results);
  }

}
