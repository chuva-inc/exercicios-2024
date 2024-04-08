<?php

namespace Chuva\Php\WebScrapping;

use DOMDocument;
use DOMXPath;

class Scrapper{
    public function scrap(DOMDocument $dom): array{
        $xpath = new DOMXPath($dom);
        $articlesData = [];

        //Executa uma consulta XPath para encontrar todos os elementos <a> com a classe 'paper-card'
        $articles = $xpath->query("//a[contains(@class,'paper-card')]");

        //Para cada artigo, chama o método extractArticleData para extrair os dados específicos do artigo.
        foreach ($articles as $article) {
            $articlesData[] = $this->extractArticleData($xpath, $article);
        }

        //Retorna o array com os dados dos artigos
        return [$articlesData];
    }

    //O extractArticleData e as consultas XPath são ajustados para extrair os dados baseados na estruturas do HTML.
    private function extractArticleData(DOMXPath $xpath, $article): array{
        $title = $xpath->query(".//h4[contains(@class,'paper-title')]", $article)->item(0)->nodeValue;
        $authorsList = $xpath->query(".//div[contains(@class,'authors')]/span", $article);
        $presentationType = $xpath->query(".//div[contains(@class,'tags')][1]", $article)->item(0)->nodeValue;
        $id = $xpath->query(".//div[contains(@class,'volume-info')]", $article)->item(0)->nodeValue;

        //Pego o nome dos autores e da instituiçao em arrays separados para No final, combinamos
        //o ID, título, tipo de apresentação, autores e instituições em um único array e o retornamos.
        $authors = [];
        $institutions = [];
        foreach ($authorsList as $author) {
            $authors[] = trim(explode(";", $author->nodeValue)[0]);
            $institutions[] = trim($author->getAttribute('title'));
        }

        //Aqui é retornado o unico array.
        return array_merge([$id, $title, $presentationType], $authors, $institutions);
    }
}