<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Writer\Common\Creator\WriterEntityFactory;

class OpenSpout
{
    public function saveToXls(array $data)
    {
        $writer = WriterEntityFactory::createXLSXWriter();

        $writer->openToFile(__DIR__ . '/../../assets/model-new.xls'); // write data to a file or to a PHP stream

        $head = [
            WriterEntityFactory::createCell('ID'),
            WriterEntityFactory::createCell('Title'),
            WriterEntityFactory::createCell('Type'),
        ];

        for( $i = 1; $i <= $this->countAuthorsMax($data); $i++) {
            array_push($head, WriterEntityFactory::createCell('Author '. $i));
            array_push($head, WriterEntityFactory::createCell('Author '. $i .' Institution'));
        }
        /** add a row at a time */
        $singleRow = WriterEntityFactory::createRow($head);
        $writer->addRow($singleRow);

        foreach($data as $values) {
            $paper = (array) $values;
            $rowValue = [
                $paper['id'],
                $paper['title'],
                $paper['type'],
            ];
            
            foreach ($paper['authors'] as $author) {
                array_push($rowValue, $author->name);
                array_push($rowValue, $author->institution);
            }

            $rowFromValues = WriterEntityFactory::createRowFromArray($rowValue);
            $writer->addRow($rowFromValues);
        }

        $writer->close();
    }

    public function countAuthorsMax(array $papers)
    {
        $count = 0;

        foreach($papers as $paper) {
            $countAuthors = count($paper->authors);
            if ($countAuthors >= $count) {
                $count = $countAuthors;
            }
        }

        return $count;
    }
}
