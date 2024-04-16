<?php

namespace Chuva\Php\WebScrapping;

require_once 'vendor/autoload.php';

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use OpenSpout\Writer\Common\Creator\WriterFactory;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Row;

class Excel {

    /**
    * Exports data information to a spreadsheet.
    */
    public function maxAuthors(Array $papers): int {
        $max = 0;
        
        foreach($papers as $paper){
            $max = max($max, $paper->authors->countAuthors());
        }
        
        return $max;
    }

    public function export(Array $papers): void{

        $writer = WriterFactory::createFromFile(__DIR__ . '/../../assets/data.xlsx');

        $writer->openToFile(__DIR__ . '/../../assets/data.xlsx');

        // Creates an array with the headers values
        $headers = ['ID', 'Title', 'Type'];
        $maxAuthor = $this->maxAuthors($papers);
        for ($i = 0; $i < $maxAuthor; $i++) {
            array_push($headers, "Author " . ($i + 1), "Author " . ($i + 1) . " Institution ");
        }

        // Creates a spreadsheet header style
        $boldStyle = (new Style())->setFontBold();

        // Creates the headers row
        $headersRow = Row::fromValues($headers);
        $headersRow->setStyle($boldStyle);

        // Adds the row in the spreadsheet
        $writer->addRow($headersRow);

        // Closes the writer and saves the file
        $writer->close();
       
    }
}



