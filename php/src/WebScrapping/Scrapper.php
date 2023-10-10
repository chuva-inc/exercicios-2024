<?php

namespace Chuva\Php\WebScrapping;

class Scrapper {
  public function scrap(\DOMDocument $dom): array {
    $xpath = new \DOMXPath($dom);

    // Usando o XPath para encontrar os elementos na página HTML
    $title = $xpath->query("//h4[@class='my-xs paper-title']");
    $type = $xpath->query("//div[@class='tags mr-sm']");
    $authors = $xpath->query("//div[@class='authors']");
    $id = $xpath->query("//div[@class='volume-info']");

    $data = [];

    // Usando o for pelos elementos encontrados e criando um array
    for ($i = 0; $i < $title->length; $i++) {
      $rowData = [
        'Title' => $title->item($i)->textContent,
        'Type' => $type->item($i)->textContent,
        'Authors' => $authors->item($i)->textContent,
        'ID' => $id->item($i)->textContent,
      ];

      $data[] = $rowData;
    }

    return $data;
  }
}