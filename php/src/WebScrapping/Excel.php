<?php

require_once 'vendor/autoload.php';

namespace Chuva\Php\WebScrapping;

require_once __DIR__ . '/../../vendor/autoload.php';

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;
use OpenSpout\Writer\Common\Creator\WriterFactory;

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

        $headers = ['ID', 'Title', 'Type'];
        $maxAuthor = $this->maxAuthors($papers);
        for ($i = 0; $i < $maxAuthor; $i++) {
            array_push($headers, "Author " . ($i + 1), "Author " . ($i + 1) . " Institution ");
        }

        $boldStyle = (new StyleBuilder())->setFontBold()->build();
        $rowFromValues = WriterEntityFactory::createRowFromArray($headers, $boldStyle);
       
        
    }
}



