<?php

namespace Chuva\Php\WebScrapping;

use DOMDocument;

/**
 * Runner for the Webscrapping exercise.
 */
class Main {
    /**
     * Main runner, instantiates a Scrapper and runs.
     */
    public static function run(): void {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

        $scraper = new Scrapper();
        $data = $scraper->scrap($dom);


       // Write your logic to save the output file bellow.
        ExcelUtility::createExcelFileFromPapers($data);
    }
}
