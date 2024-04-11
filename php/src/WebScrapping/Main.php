<?php

namespace Chuva\Php\WebScrapping;


use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

    /**
     * @throws WriterNotOpenedException
     * @throws IOException
     * @throws InvalidArgumentException
     */

  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html', LIBXML_NOERROR);
    
    $data = (new Scrapper())->scrap($dom);
    // var_dump($data);
    // exit();
    $xlsx = (new CreateXlsx())->create($data);
  }

}
