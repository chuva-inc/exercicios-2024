<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Common\Entity\Cell;
use OpenSpout\Common\Entity\Row;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    @$dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $papers = (new Scrapper())->scrap($dom);

    $writer = new \OpenSpout\Writer\XLSX\Writer();
    $writer->openToFile(__DIR__ . '/../../assets/scrappedData.xlsx');

    //adicionando cabeçalho da planilha
    $header = [
      Cell::fromValue('ID'),
      Cell::fromValue('Title'),
      Cell::fromValue('Type'),
  ];
  
    $singleRow = new Row($header);
    $writer->addRow($singleRow);

    foreach ($papers as $paper) {
      // Create a row for each paper
      $row = new Row([
          Cell::fromValue($paper->id),
          Cell::fromValue($paper->title),
          Cell::fromValue($paper->type),
      ]);

      //usar um vetor de autores para guardar info de TDS autores
         $authorInfo = [];

         //pra cada autor em autores quero preencher as celulas
         foreach ($paper->authors as $author) {
          $authorInfo[] = $author->name; //teoricamente aqui imprime o nome do autor
          $authorInfo[] = $author->institution; //teoricamente aqui imprime o nome da instituiçao do autor
}

      //cria nova linha combinando as celulas infos do artigo + celulas info autores
      $row = new Row(array_merge($row->getCells(), array_map(fn ($value) => Cell::fromValue($value), $authorInfo)));
}