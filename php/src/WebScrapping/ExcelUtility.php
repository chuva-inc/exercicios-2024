<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class ExcelUtility {

   
    public static function createExcelFileFromPapers(array $papers): void {
        $writer = WriterEntityFactory::createXLSXWriter();

        $filePath = __DIR__ . '/../../assets/dados.xlsx';
        $writer->openToFile($filePath);

        
        $row = WriterEntityFactory::createRowFromArray(['ID', 'Title', 'Type', 'Author 1', 'Author 1 Institution', 'Author 2', 'Author 2 Institution', 'Author 3', 'Author 3 Institution', 'Author 4', 'Author 4 Institution', 'Author 5', 'Author 5 Institution', 'Author 6', 'Author 6 Institution', 'Author 7', 'Author 7 Institution', 'Author 8', 'Author 8 Institution', 'Author 9', 'Author 9 Institution']);
        $writer->addRow($row);


        foreach ($papers as $paper) {
            $data = [
                $paper->id,
                $paper->title,
                implode(', ', $paper->type),
            ];

            foreach ($paper->authors as $author) {
                $data[] = $author->name;
                $data[] = $author->institution;
            }

            $row = WriterEntityFactory::createRowFromArray($data);
            $writer->addRow($row);
        }

        $writer->close();
    }
}
