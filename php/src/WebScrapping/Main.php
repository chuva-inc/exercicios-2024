<?php

namespace Chuva\Php\WebScrapping;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $allData = (new Scrapper())->scrap($dom);

    // Write your logic to save the output file bellow.
    
    // Define o arquivo de saída
    $outputFilePath = "result.xlsx";

    // Cria um novo objeto Writer para criar um arquivo XLSX
    $writer = WriterEntityFactory::createXLSXWriter();
    // Abre o arquivo de saída para escrita
    $writer->openToFile($outputFilePath);

    // Define as informações fixas do cabeçalho da planilha
    $header = [ "ID","Title","Type"];

    // Inicializa a variável para armazenar o número máximo de autores
    $authorsTotal = 0;

    // Itera sobre todos os dados para determinar o número máximo de autores em um único item de dados
    foreach ($allData as $singleData) {
      $authorsCount = $singleData->getAuthorCount();
      // Verifica se o número de autores em $authorsCount é maior que o número máximo atual de autores
      if ($authorsCount > $authorsTotal) {
        // Atualiza o número total de autores se a condicional for verdadeira
        $authorsTotal = $authorsCount;
      }
    }

    // Adiciona autor e instituição ao cabeçalho da planilha
    for ($i = 1; $i <= $authorsTotal; $i++) {
      $header[] = "Author $i";               // Adiciona coluna para o nome do autor
      $header[] = "Author $i Institution";   // Adiciona coluna para a instituição do autor
    }

    // Cria uma linha de cabeçalho da planilha usando os dados do cabeçalho
    $headerRow = WriterEntityFactory::createRowFromArray($header);
    // Adiciona a linha de cabeçalho à planilha
    $writer->addRow($headerRow);

    foreach ($allData as $data) {
      $dataValues = [ // Array para armazenar os dados do artigo
        $data->getId(), // Retorna o ID do dado atual
        $data->getTitle(), // Retorna o título do dado atual
        $data->getType() // Retorna o tipo do dado atual
      ];
      
      // Itera sobre os dados do artigo atual para retornar os valores referentes aos autores
      foreach ($data->getAuthors() as $authorData) {
        $authorName = $authorData->getName(); // Retorna os nomes dos autores e atribui a variável
        $dataValues[] = $authorName; // Adiciona o nome dos autores aos dados do artigo

        $authorInstitution = $authorData->getInstitution(); // Retorna a instituição dos autores e atribui a variável
        $dataValues[] = $authorInstitution; //Adiciona a instituição ou as instituições dos autores aos dados do artigo
      }
  
      $rowDataEntity = WriterEntityFactory::createRowFromArray($dataValues); // Cria uma entidade de linha com base nos valores de dados
      $writer->addRow($rowDataEntity); // Adiciona a linha ao escritor 
    }
  
    // Fecha o arquivo de saída
    $writer->close();

  }

}
