<?php

namespace Chuva\Php\WebScrapping;

use DOMXPath;
use DOMDocument;

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;
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



    // Loop sobre o array de strings
    foreach ($data as $html) {
      // Suprima os avisos de erros para carregar o HTML, pois ele pode conter erros de formatação
      libxml_use_internal_errors(true);



      // encontrar todos os elementos <a>
      $links = $dom->getElementsByTagName('a');
      foreach ($links as $link) {
        $linksArray[] = $link->getAttribute('href');
      }
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

    $filePath = getcwd() . '/t22.xlsx';

    $writer = WriterEntityFactory::createXLSXWriter();



    $writer->openToFile($filePath);



    // foreach ($conteudosDiv as $conteudo) {

    // $cells = [
    //   WriterEntityFactory::createCell($conteudo)
    //];



    //  $singleRow = WriterEntityFactory::createRow($cells);
    // $writer->addRow($singleRow);
    // }


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

    $multiplerows = [];

    for ($i = 0; $i < count($conteudosDiv) && $i < count($conteudosH4); $i++) {
      $cells = [
        WriterEntityFactory::createCell($conteudosDiv[$i]),
        WriterEntityFactory::createCell($conteudosH4[$i])
      ];

      $row = WriterEntityFactory::createRow($cells);
      // Adiciona a linha ao conjunto de múltiplas linhas
      $multiplerows[] = $row;
    }

    $writer->addRows($multiplerows);



    //   foreach ($conteudosH4 as $conteudoH4) {

    //     $cells = [
    //     WriterEntityFactory::createCell($conteudoH4)
    //   ];



    //  $singleRow = WriterEntityFactory::createRow($cells);
    //  $writer->addRow($singleRow);
    // }


    $writer->close();
  }
}
