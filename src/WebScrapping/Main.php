<?php

namespace Chuva\Php\WebScrapping;

require_once __DIR__ . '/../../vendor/autoload.php';

use Box\Spout\Common\Entity\Style\Color;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;

class Scrapper
{
    /**
     * Extrai os dados relevantes do DOMDocument.
     *
     * @param \DOMDocument $dom O documento DOM.
     * @return array Os dados extraídos.
     */
    public function scrap(\DOMDocument $dom): array
    {
        $xpath = new \DOMXPath($dom);

        $data = [];

        // Encontrar todos os elementos <a> com a classe "paper-card"
        $nodes = $xpath->query('//a[contains(@class, "paper-card")]');

        foreach ($nodes as $node) {
            // Extrair o ID do link
            $id = basename($node->getAttribute('href'));

            // Extrair o título
            $title = $node->getElementsByTagName('h4')->item(0)->nodeValue;

            // Extrair os autores e suas instituições
            $authors = [];
            $authorsElements = $node->getElementsByTagName('span');
            foreach ($authorsElements as $authorElement) {
                $author = $authorElement->nodeValue;
                $institution = $authorElement->getAttribute('title');
                $authors[] = [
                    'name' => $author,
                    'institution' => $institution,
                ];
            }

            // Extrair o tipo da apresentação
            $type = '';
            $tagsElements = $node->getElementsByTagName('div');
            foreach ($tagsElements as $tagElement) {
                if ($tagElement->getAttribute('class') === 'tags mr-sm') {
                    $type = $tagElement->nodeValue;
                    break;
                }
            }

            // Adicionar os dados ao array
            $data[] = [
                'id' => $id,
                'title' => $title,
                'type' => $type,
                'authors' => $authors,
            ];
        }

        return $data;
    }
}

class Main
{
    /**
     * Main runner: Executa o programa principal, instanciando um Scrapper e executando-o.
     */
    public static function run(): void
    {
        $dom = new \DOMDocument('1.0', 'utf-8');
        $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

        $scrapper = new Scrapper();
        $data = $scrapper->scrap($dom);

        // Criar uma planilha Excel utilizando Spout 
        $writer = WriterEntityFactory::createXLSXWriter();
        $writer->openToFile(__DIR__ . '/tabeladados.xlsx');

        // Definir estilos para as colunas
        $headerStyle = (new StyleBuilder())
            ->setFontBold()
            ->setFontSize(12)
            ->setFontColor(Color::GREEN)
            ->build();

        // Adicionar os cabeçalhos com estilo personalizado
        $headerRowData = [
            'ID', 'Title', 'Type', 'Author', 'Author Institution', 'Author 2', 'Author 2 Institution',
            'Author 3', 'Author 3 Institution', 'Author 4', 'Author 4 Institution', 'Author 5', 'Author 5 Institution',
            'Author 6', 'Author 6 Institution', 'Author 7', 'Author 7 Institution', 'Author 8', 'Author 8 Institution',
            'Author 9', 'Author 9 Institution'
        ];

        $headerRow = WriterEntityFactory::createRowFromArray($headerRowData, $headerStyle);
        $writer->addRow($headerRow);

        // Adicionar os dados
        foreach ($data as $paper) {
            $authors = self::formatAuthors($paper['authors']);
            $rowData = [$paper['id'], $paper['title'], $paper['type'], ...$authors];
            $row = WriterEntityFactory::createRowFromArray($rowData);
            $writer->addRow($row);
        }

        // Fechar a planilha
        $writer->close();
    }

    /**
     * Formatar os autores de acordo com a estrutura desejada.
     *
     * @param array $authors Os autores.
     * @return array Os autores formatados.
     */
    private static function formatAuthors(array $authors): array
    {
        $formattedAuthors = [];
        for ($i = 0; $i < 9; $i++) {
            $author = $authors[$i] ?? null;
            if ($author) {
                $formattedAuthors[] = $author['name'];
                $formattedAuthors[] = $author['institution'];
            } else {
                $formattedAuthors[] = null;
                $formattedAuthors[] = null;
            }
        }
        return $formattedAuthors;
    }
}

// Executar o método run() para criar a planilha Excel
Main::run();
