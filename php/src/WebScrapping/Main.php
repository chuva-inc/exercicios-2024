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
    $ids = [];

    // Write your logic to save the output file bellow.
    print_r($data);



    // Inicializa um novo objeto DOMDocument
    //$domm = new \DOMDocument();

    // Loop sobre o array de strings
    foreach ($data as $html) {
      // Suprima os avisos de erros para carregar o HTML, pois ele pode conter erros de formatação
      libxml_use_internal_errors(true);

      // Carrega o HTML na estrutura DOM
      //   $dom->loadHTML($html);

      // Volte a exibir os avisos de erros
      //  libxml_use_internal_errors(false);

      // Agora você pode manipular o DOM como necessário...

      // Por exemplo, encontrar todos os elementos <a> e imprimir seus atributos href
      $links = $dom->getElementsByTagName('a');
      foreach ($links as $link) {
        $linksArray[] = $link->getAttribute('href');
      }
    }

    $xpath = new DOMXPath($dom);
    $atributoClasseId = "volume-info";
    $divs = $xpath->query("//div[contains(@class, '$atributoClasseId')]");

    foreach ($divs as $div) {
      // Obtém o conteúdo da div e adiciona ao array $conteudosDiv
      $conteudoDiv = $div->nodeValue;
      $conteudosDiv[] = $conteudoDiv;



      $filePath = getcwd() . '/t12.xlsx';

      $writer = WriterEntityFactory::createXLSXWriter();



      $writer->openToFile($filePath);



      foreach ($conteudosDiv as $conteudo) {

        $cells = [
          WriterEntityFactory::createCell($conteudo)
        ];



        $singleRow = WriterEntityFactory::createRow($cells);
        $writer->addRow($singleRow);
      }





      $writer->close();
    }





    //vetor de ids

    //achar div
    //achar classe dentro da div

    //  $data = [
    //  ['id'],
    //[$conteudo],
    // 
    //];
















  } //runer
}//main
