<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;
use Box\Spout\Common\Exception\InvalidArgumentException;
use Box\Spout\Common\Exception\IOException;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Exception\WriterNotOpenedException;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

class CreateXlsx {

    public function create($scrapper) {
        $filePath = __DIR__ . '/../../assets/teste.xlsx';     
    
        $headers = [
        'ID',
        'TITTLE',
        'TYPE',
        ];

        $maxAuthors = 0;
        foreach ($scrapper as $paper) {
        $maxAuthors = max($maxAuthors, count($paper->authors));
        }

        // Adiciona os cabeçalhos de AUTOR e INSTITUIÇÃO com base no número máximo de autores
        for ($i = 1; $i <= $maxAuthors; $i++) {
        $headers[] = "AUTHOR " . $i;
        $headers[] = "INSTITUTION " . $i;
        }

        $writer = WriterEntityFactory::createXLSXWriter();

        // Estilizando header
        $headerStyle = (new StyleBuilder())
            ->setFontBold()
            ->setFontName('Arial')
            ->setFontSize(11)
            ->setCellAlignment(CellAlignment::LEFT)
            ->setBackgroundColor(Color::YELLOW)
            ->build();

        // Estilizando fonte e celulas
        $defaultStyle = (new StyleBuilder())
            ->setFontName('Arial')
            ->setFontSize(11)
            ->setCellAlignment(CellAlignment::LEFT)
    //            ->setShouldWrapText()
            ->build();

        // Aplica o estilo padrão a todas as células
        $writer->setDefaultRowStyle($defaultStyle)->openToFile($filePath);

        $rows = [];

        foreach ($scrapper as $paper) {
        $row = [
            $paper->id,
            $paper->title,
            $paper->type
        ];
        $authorsName = [];
        $authorsInstitution = [];
        
        foreach ($paper->authors as $author) {
            $authorsName[] = $author->name;
            $authorsInstitution[] = $author->institution;
        }
        // Preenche com vazio para autores e instituições que não existem
        while (count($authorsName) < $maxAuthors) {
            $authorsName[] = '';
            $authorsInstitution[] = '';
        }
        $row = array_merge($row, $authorsName, $authorsInstitution);

        $rows[] = $row;
        }
        $writer->addRow(WriterEntityFactory::createRowFromArray($headers, $headerStyle));

        foreach ($rows as $row) {
        $writer->addRow(WriterEntityFactory::createRowFromArray($row));
        }

        // var_dump($writer);
        // echo PHP_EOL;
        // var_dump($filePath);
        // exit();

        $writer->close();
    }

}