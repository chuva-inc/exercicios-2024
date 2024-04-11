<?php

namespace Chuva\Php\WebScrapping;

use DOMXPath;
use DOMDocument;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\ControlStructures\ForEachLoopDeclarationSniff;
use PhpParser\Node\Stmt\Echo_;

/**
 * Runner for the Webscrapping exercice.
 */
class Main
{



  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void
  {
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $data = (new Scrapper())->scrap($dom);



    // Write your logic to save the output file bellow.
    print_r($data);



    // tentativa de iterar em $data
    foreach ($data as $html) {
      // Suprima os avisos de erros para carregar o HTML, pois ele pode conter erros de formatação
      libxml_use_internal_errors(true);
    }
    // encontrar todos os elementos <a>
    $links = $dom->getElementsByTagName('a');
    foreach ($links as $link) {
      $linksArray[] = $link->getAttribute('href');
    }

    //encontrar as div que possue uma classe com o atributo "volume-info"
    $xpath = new DOMXPath($dom);
    $atributoClasseId = "volume-info";
    $divs = $xpath->query("//div[contains(@class, '$atributoClasseId')]");

    foreach ($divs as $div) {
      // Obtém o conteúdo da div e adiciona ao array $conteudosDiv
      $conteudoDiv = $div->nodeValue;
      $conteudosDiv[] = $conteudoDiv;
    }

    $filePath = getcwd() . '/t34.xlsx';

    $writer = WriterEntityFactory::createXLSXWriter();



    $writer->openToFile($filePath);



    //****encontrando os titulos*****
    //encontrar o elemento h4 
    //encontrar a classe desse elemento que possui atributo  "my-xs paper-title"

    $atributoClasseTitulo = "my-xs paper-title";
    $h4s = $xpath->query("//h4[contains(@class, '$atributoClasseTitulo')]");

    foreach ($h4s as $h4) {
      // Obtém o conteúdo do h4 e adiciona ao array $conteudosH4
      $conteudoH4 = $h4->nodeValue;
      $conteudosH4[] = $conteudoH4;
    }

    $atributoClasseType = "tags mr-sm";
    $divsType = $xpath->query("//div[contains(@class, '$atributoClasseType')]");

    foreach ($divsType as $divType) {
      $conteudoDivType = $divType->nodeValue;
      $conteudosDivType[] = $conteudoDivType;
    }

    $atributoDivAutores = "authors";
    $divsAutores = $xpath->query("//div[contains(@class, '$atributoDivAutores')]"); //obter os autores indivíduais

    foreach ($divsAutores as $divAutores) {
      $conteudoDivAutores = $divAutores->nodeValue;
      $conteudosDivAutores[] = $conteudoDivAutores;
    }



    $spanTitlesInstituicao = $xpath->query("//span[@title]");

    foreach ($spanTitlesInstituicao as $spanTitle) {
      $spanTitlesInstituicaoConteudo = $spanTitle->getAttribute('title');
      $spanTitlesInstituicaoConteudos[] = $spanTitlesInstituicaoConteudo;
    }

    $autoresEInstituicoes = [];

    foreach ($divsAutores as $index => $divAutores) {
      $autor = $divAutores->nodeValue;
      $instituicao = $spanTitlesInstituicaoConteudos[$index];

      $autoresEInstituicoes[] = ['autor' => $autor, 'instituicao' => $instituicao];
    }






    $coluna = 3;
    $multiplerows = [];

    for ($i = 0; $i < count($conteudosDiv) && $i < count($conteudosH4) && $i < count($conteudosDivType) && $i < count($conteudosDivAutores) && $i < count($autoresEInstituicoes); $i++) {
      $pares = $autoresEInstituicoes[$i];
      $cells = [
        WriterEntityFactory::createCell($conteudosDiv[$i]),
        WriterEntityFactory::createCell($conteudosH4[$i]),
        WriterEntityFactory::createCell($conteudosDivType[$i]),
        WriterEntityFactory::createCell($pares['autor']),
        WriterEntityFactory::createCell($pares['instituicao']),
      ];

      $row = WriterEntityFactory::createRow($cells);
      // Adiciona a linha ao conjunto de múltiplas linhas
      $multiplerows[] = $row;
    }

    $writer->addRows($multiplerows);





    $writer->close();
  }
}
