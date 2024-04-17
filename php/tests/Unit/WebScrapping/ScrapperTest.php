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

  /**
   * Tests scrap return.
   */
  public function testScrapReturn() {
    $dom = new \DOMDocument('1.0', 'utf-8');
    @$dom->loadHTML('
    <html>
      <body>
        <a href="testLink" class="paper-card p-lg bd-gradient-left">
          <h4 class="my-xs paper-title">Test Title</h4>
          <div class="authors">
            <span title="Test Institution">Test Person;</span> 
          </div>
          <div>
            <div class="tags mr-sm">Test Poster Type</div>
            <div class="tags flex-row mr-sm">
              <div class="expand">
              </div>
              <div class="volume-info">Test ID</div>
            </div>
          </div>
        </a>
      </body>
    </html>');

    $scrapper = new Scrapper();
    $results = $scrapper->scrap($dom);
    $target = $results[0];
    $targetAuthor = $target->authors[0];

    $this->assertSame(1, count($results));
    
    $this->assertInstanceOf('Chuva\Php\WebScrapping\Entity\Paper', $target);
    $this->assertSame('Test ID', $target->id);
    $this->assertSame("Test Title", $target->title);
    $this->assertSame("Test Poster Type", $target->type);

    $this->assertInstanceOf('Chuva\Php\WebScrapping\Entity\Person', $targetAuthor);
    $this->assertSame("Test Person", $targetAuthor->name);
    $this->assertSame("Test Institution", $targetAuthor->institution);
  }

}
