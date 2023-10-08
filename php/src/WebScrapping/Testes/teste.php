<?php 

require 'vendor/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;

$filePath = 'exemplo.xlsx';

    $writer = WriterEntityFactory::createXLSXWriter();
    $writer->openToFile($filePath);

    $style = (new StyleBuilder())
        ->setFontBold()
        ->build();

    $headerRow = WriterEntityFactory::createRowFromArray(['Nome', 'Idade', 'Cidade'], $style);
    $writer->addRow($headerRow);

    $data = [
        ['João', 30, 'São Paulo'],
        ['Maria', 28, 'Rio de Janeiro'],
        ['Pedro', 35, 'Belo Horizonte'],
    ];

    foreach ($data as $row) {
        $rowData = WriterEntityFactory::createRowFromArray($row);
        $writer->addRow($rowData);
    }

    $writer->close();

    echo "Tabela criada com sucesso em $filePath";