<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Writer\Common\Creator\WriterEntityFactory;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Reader\Common\Creator\ReaderEntityFactory;

class OpenSpout
{
    public function saveToXls(array $data)
    {
        $writer = WriterEntityFactory::createXLSXWriter();

        $writer->openToFile(__DIR__ . '/../../assets/model1.xls'); // write data to a file or to a PHP stream
        //$writer->openToBrowser($fileName); // stream data directly to the browser

        $cells = [
            WriterEntityFactory::createCell('Carl'),
            WriterEntityFactory::createCell('is'),
            WriterEntityFactory::createCell('great!'),
        ];

        $cells = [
            WriterEntityFactory::createCell('Carl'),
            WriterEntityFactory::createCell('is'),
            WriterEntityFactory::createCell('great!'),
        ];

        /** add a row at a time */
        $singleRow = WriterEntityFactory::createRow($cells);
        $writer->addRow($singleRow);

        /** add multiple rows at a time */
        $multipleRows = [
            WriterEntityFactory::createRow($cells),
            WriterEntityFactory::createRow($cells),
        ];
        $writer->addRows($multipleRows);

        /** Shortcut: add a row from an array of values */
        $values = ['Carl', 'is', 'great!'];
        $rowFromValues = WriterEntityFactory::createRowFromArray($values);
        $writer->addRow($rowFromValues);

        $writer->close();
    }
}
