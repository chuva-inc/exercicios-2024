<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Writer\Common\Creator\WriterEntityFactory;

class XlsxCreator {

    public static function create(array $data): string {
        // Create a new XLS file
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile('./file.xlsx');

        // Determine the maximum number of authors
        $maxAuthors = 0;
        foreach ($data as $paper) {
            $maxAuthors = max($maxAuthors, count($paper->getAuthors()));
        }

        // Adjust the header
        $headers = [
            'ID', 'Title', 'Type',
        ];
        for ($i = 1; $i <= $maxAuthors; $i++) {
            $headers[] = "Author {$i}";
            $headers[] = "Author {$i} Institution";
        }
        $writer->addRow(WriterEntityFactory::createRowFromArray($headers));

        // Fill the file with the data of the papers
        foreach ($data as $paper) {
            $row = [
                $paper->getId(),
                $paper->getTitle(),
                $paper->getType(),
            ];

            // Add authors and their institutions
            foreach ($paper->getAuthors() as $author) {
                $row[] = $author->getName();
                $row[] = $author->getInstitution();
            }

            // Fill with empty for the author fields that were not filled
            while (count($row) < 3 * $maxAuthors + 3) {
                $row[] = '';
            }

            $writer->addRow(WriterEntityFactory::createRowFromArray($row));
        }

        // Close the file
        $writer->close();

        return './file.xlsx'; // Return the path of the created file
    }
}
