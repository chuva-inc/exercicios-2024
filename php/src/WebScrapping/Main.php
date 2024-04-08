<?php

namespace Chuva\Php\WebScrapping;

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

    //O objetivo aqui é iterar sobre $data e coletar e armazenar em um vetor todos os id
    foreach ($data as $item) {
      if (isset($item->id)) {
        $ids[] = $item->id;
      }
    }


    //Preciso pegar os dados dentro de $data e colocar eles dentro de uma planilha
    // uma planilha possui linhas e colunas. Neste caso vou ter as colunas: id, title, type e authors
    //Pegar um dado dentro de uma var e colocar na planilha no campo espécíficado que ela pertence


    //1 - ler a var $data e pegar todos os id   Armazenando  em um vetor. Fazer a mesma coisa com as outra colunas.
    // escrever os vetores na planilha
    // Vou pedir pro spout escrver um lista 

    $writer = WriterEntityFactory::createXLSXWriter();



    $writer->openToFile("./assets/solucao.xlsx");
  }
}
