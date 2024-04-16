<?php

namespace Chuva\Php\WebScrapping;

require_once __DIR__ . '/../../vendor/autoload.php';

use OpenSpout\Writer\XLSX\Writer;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Row;

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

        $filepath = __DIR__ . '/../../assets/data.xlsx';

        $writer->openToFile($filepath);

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
        $headersRow = Row::fromValues($headers);

        // Adds the row in the spreadsheet
        $writer->addRow($headersRow, $style);

        // Closes the writer and saves the file
        $writer->close();
       
    }
}



