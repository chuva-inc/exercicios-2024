<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class ExcelUtility {

   
    public static function createExcelFileFromPapers(array $papers): void {
        $writer = WriterEntityFactory::createXLSXWriter();

        $filePath = __DIR__ . '/../../assets/dados.xlsx';
        $writer->openToFile($filePath);

        
        $row = WriterEntityFactory::createRowFromArray(['ID', 'Title', 'Type', 'Author 1', 'Institution 1', 'Author 2', 'Institution 2', 'Author 3', 'Institution 3', 'Author 4', 'Institution 4', 'Author 5', 'Institution 5', 'Author 6', 'Institution 6', 'Author 7', 'Institution 7', 'Author 8', 'Institution 8', 'Author 9', 'Institution 9']);
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
