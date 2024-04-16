<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use Openspout\Writer\Common\Creator\WriterEntityFactory;
use Openspout\Writer\Common\Creator\Style\StyleBuilder;

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

        require_once 'vendor/openspout/openspout/src/Autoloader/autoload.php';

        $writer = WriterEntityFactory::createXLSXWriter();

        $writer->openToFile(__DIR__ . '/../../assets/data.xlsx');

        $headers = ['ID', 'Title', 'Type'];
        $maxAuthor = $this->maxAuthors($papers);
        for ($i = 0; $i < $maxAuthor; $i++) {
            array_push($headers, "Author " . ($i + 1), "Author " . ($i + 1) . " Institution ");
        }

        $boldStyle = (new StyleBuilder())->setFontBold()->build();
        $rowFromValues = WriterEntityFactory::createRowFromArray($headers, $boldStyle);
       
        
    }
}



