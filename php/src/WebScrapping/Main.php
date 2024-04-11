<?php

namespace Chuva\Php\WebScrapping;

use DOMDocument;
use OpenSpout\Common\Entity\Cell;
use OpenSpout\Common\Entity\Row;

/**
 * Runner for the Webscrapping exercice.
 */
class Main
{

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void
  {
    $dom = new DOMDocument('1.0', 'utf-8');
    libxml_use_internal_errors(true);

    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;

    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $data = (new Scrapper())->scrap($dom);
    $saveToXls = new OpenSpout();
    $saveToXls->saveToXls($data);
  }
}
