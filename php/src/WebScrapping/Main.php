<?php

namespace Chuva\Php\WebScrapping;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use DOMDocument;

class Main{
    //o Caminho para a planilhar ser criada.
    private const OUTPUT_FILE_PATH = 'C:\Users\Andre\Documents\GitHub\exercicios-2024\php\assets\PlanilhaFinal.xlsx';

    //Cabeçalho que vai ser posto na planilha.
    private const HEADERS = [
        'ID', 'Titulo', 'Tipo',
        'Autor 1', 'Autor 1 Instituição', 'Autor 2', 'Autor 2 Instituição',
        'Autor 3', 'Autor 3 Instituição', 'Autor 4', 'Autor 4 Instituição',
        'Autor 5', 'Autor 5 Instituição', 'Autor 6', 'Autor 6 Instituição',
        'Autor 7', 'Autor 7 Instituição', 'Autor 8', 'Autor 8 Instituição',
        'Autor 9', 'Autor 9 Instituição', 'Autor 10', 'Autor 10 Instituição',
    ];

    //Define o método run, que carrega o documento HTML, executando o método scrap da classe Scrapper
    // para extrair os dados e cria a planilha.
    public static function run(): void{
        $dom = new DOMDocument('1.0', 'utf-8');
        libxml_use_internal_errors(true);
        $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

        //extrai os dados do HTML.
        $scrapper = new Scrapper();
        $data = $scrapper->scrap($dom);

        //Chama o método createXlsxFile para criar a planilha com os dados extraídos.
        self::createXlsxFile($data);
    }

    // Cria um escritor de planilha, abre o arquivo de saída, adiciona os cabeçalhos e
    // itera sobre os dados, adicionando-os à planilha.
    private static function createXlsxFile(array $data): void{
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile(self::OUTPUT_FILE_PATH);
        $writer->addRow(WriterEntityFactory::createRowFromArray(self::HEADERS));

        foreach ($data[0] as $articleData) {
            $writer->addRow(WriterEntityFactory::createRowFromArray($articleData));
        }

        $writer->close();
    }
}