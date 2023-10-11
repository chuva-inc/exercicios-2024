<?php

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

$existingFilePath = '/path/to/my-music.ods';
$newFilePath = '/path/to/my-new-music.ods';

// we need a reader to read the existing file...
$reader = ReaderEntityFactory::createReaderFromFile($existingFilePath);
$reader->open($existingFilePath);
$reader->setShouldFormatDates(true); // this is to be able to copy dates

// ... and a writer to create the new file
$writer = WriterEntityFactory::createWriterFromFile($newFilePath);
$writer->openToFile($newFilePath);

// let's read the entire spreadsheet
foreach ($reader->getSheetIterator() as $sheetIndex => $sheet) {
    // Add sheets in the new file, as you read new sheets in the existing one
    if ($sheetIndex !== 1) {
        $writer->addNewSheetAndMakeItCurrent();
    }

    foreach ($sheet->getRowIterator() as $rowIndex => $row) {
        $songTitle = $row->getCellAtIndex(0);
        $artist = $row->getCellAtIndex(1);

        // Change the album name for "Yellow Submarine"
        if ($songTitle === 'Yellow Submarine') {
            $row->setCellAtIndex(WriterEntityFactory::createCell('The White Album'), 2);
        }

        // skip Bob Marley's songs
        if ($artist === 'Bob Marley') {
            continue;
        }

        // write the edited row to the new file
        $writer->addRow($row);

        // insert new song at the right position, between the 3rd and 4th rows
        if ($rowIndex === 3) {
            $writer->addRow(
                WriterEntityFactory::createRowFromArray(['Hotel California', 'The Eagles', 'Hotel California', 1976])
            );
        }
    }
}

$reader->close();
$writer->close();
