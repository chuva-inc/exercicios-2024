<?php

namespace Chuva\Php\WebScrapping;

libxml_use_internal_errors(true);
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

require 'Scrapper.php';
require_once 'php/vendor/autoload.php';
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
        $dom = new \DOMDocument('1.0', 'utf-8');
        $dom->loadHTMLFile(__DIR__.'/../../assets/origin.html');

        $data = (new Scrapper())->scrap($dom);

        $xlsxFile = __DIR__.'/output.xlsx';

        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile($xlsxFile);

        // Create spreadsheet header with all columns of "Author X" and "Author X Institution"
        $headers = ['ID', 'Title', 'Type'];
        for ($i = 1; $i <= 9; ++$i) {
            $headers[] = "Author $i";
            $headers[] = "Author $i Institution";
        }

        $headerRow = WriterEntityFactory::createRowFromArray($headers);
        $writer->addRow($headerRow);

        foreach ($data as $paper) {
            $rowData = [
                $paper->id,
                $paper->title,
                $paper->type,
            ];

            // Make sure it has 9 authors
            $authors = array_slice($paper->authors, 0, 9);

            for ($i = 0; $i < 9; ++$i) {
                if (isset($authors[$i])) {
                    $author = $authors[$i];
                    $rowData[] = $author->name;
                    $rowData[] = $author->institution;
                } else {
                    // Fill in blank values if there is no corresponding author
                    $rowData[] = '';
                    $rowData[] = '';
                }
            }

            $row = WriterEntityFactory::createRowFromArray($rowData);
            $writer->addRow($row);
        }

        $writer->close();
    }
}