<?php

namespace Chuva\Php\WebScrapping;

require __DIR__ . '/../../vendor/autoload.php';

use OpenSpout\Writer\XLSX\Writer;
use OpenSpout\Writer\XLSX\Options;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Row;

class Excel {

    
    public function maxAuthors(Array $papers): int {
        $max = 0;
        
        foreach($papers as $paper){
            $max = max($max, $paper->countAuthors());
        }
        
        return $max;
    }

    /**
    * Exports data information to a spreadsheet.
    */
    public function export(Array $papers): void{

        // Creates and open a xlsx file
        $filepath = __DIR__ . '/../../assets/data.xlsx';
        $options = new Options();
        $writer = new Writer($options);
        $writer->openToFile($filepath);
        

        // Set the columns width
        $options->setColumnWidth(15.0, 2);
        $options->setColumnWidth(5.0, 3);
        for($i = 4; $i < $this->maxAuthors($papers)*2; $i++){
            $options->setColumnWidth(7.0, $i);
        }

        // Creates an array with the headers values
        $headers = ['ID', 'Title', 'Type'];
        $maxAuthor = $this->maxAuthors($papers);
        for ($i = 0; $i < $maxAuthor; $i++) {
            $headers[] = "Author " . ($i + 1);
            $headers[] = "Author " . ($i + 1) . " Institution";
        }

        // Creates the spreadsheet header style
        $style = new Style();
        $style->setFontBold();
        $style->setFontSize(11);
        $style->setFontName('Arial');

        // Creates the headers row
        $headersRow = Row::fromValues($headers, $style);

        // Adds the row in the spreadsheet
        $writer->addRow($headersRow);
        
        // Adds a row for each paper changing the style
        $style->setFontBold(false);
        foreach ($papers as $paper){
            $row = [$paper->id, $paper->title, $paper->type];
            foreach ($paper->authors as $author){
                $row[] = $author->name;
                $row[] = $author->institution;
            }
            $row = Row::fromValues($row);
            $writer->addRow($row);
        }

        // Closes the writer and saves the file
        $writer->close();
       
    }
}



