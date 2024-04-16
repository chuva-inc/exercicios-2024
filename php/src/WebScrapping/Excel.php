<?php

namespace Chuva\Php\WebScrapping;

require_once __DIR__ . '/../../vendor/autoload.php';
//require_once '/../../vendor/openspout/openspout/src/Common/Entity/Cell.php';

//use Chuva\Php\WebScrapping\Entity\Paper;
//use Chuva\Php\WebScrapping\Entity\Person;
use OpenSpout\Writer\XLSX\Writer;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Row;
//use OpenSpout\Common\Entity\Cell;

class Excel {

    /**
    * Exports data information to a spreadsheet.
    */
    public function maxAuthors(Array $papers): int {
        $max = 0;
        
        foreach($papers as $paper){
            $max = max($max, $paper->countAuthors());
        }
        
        return $max;
    }

    public function export(Array $papers): void{

        $writer = new Writer();

        $writer->openToFile(__DIR__ . '/../../assets/data.xlsx');

        // Creates an array with the headers values
        $headers = ['ID', 'Title', 'Type'];
        $maxAuthor = $this->maxAuthors($papers);
        for ($i = 0; $i < $maxAuthor; $i++) {
            $headers[] = "Author " . ($i + 1);
            $headers[] = "Author " . ($i + 1) . " Institution";
        }

        // Creates a spreadsheet header style
        $style = new Style();
        $style->setFontBold();

        // Creates the headers row
        $headersRow = Row::fromValues($headers, $style);

        // Adds the row in the spreadsheet
        $writer->addRow($headersRow);

        // Closes the writer and saves the file
        $writer->close();
       
    }
}



