<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

class Scrapper {
  
  //Loads paper information from the HTML and returns the array with the data.
  //return [new Paper(id,titulo,tipo,[new Pessoa(autorN,instN)])]
  public function scrap(\DOMDocument $dom): array {

    $xpath = new \DOMXPath($dom); //inicializa uma variavel xpath
    
    // definindo os caminhos XPath para os elementos que queremos extrair
    $paperXpath = "//a[@class='paper-card p-lg bd-gradient-left']";
    $tituloXPath = "//h4[@class='my-xs paper-title']";
    $autorXPath = "//div[@class='authors']/span";
    $tipoXPath = "//div[@class='tags mr-sm']";
    $idXPath = "//div[@class='volume-info']";
    
    // juntando os dados de cada paper em uma unica variavel $paperNodes
    $papersNodes = $xpath->query($paperXPath);

    // criando um array para armazenar os papers
    $papers = [];
    
    // Iterar sobre os resultados e exibir os dados
    for ($i = 0; $i < $titulos->length; $i++) {
        $titulo = $titulos->item($i)->nodeValue;
        $instituicao = $instituicoes->item($i)->nodeValue;
        $autor = $autores->item($i)->nodeValue;
        $tipo = $tipos->item($i)->nodeValue;
        $id = $ids->item($i)->nodeValue;
    
        echo "Título: $titulo<br>";
        echo "Instituição: $instituicao<br>";
        echo "Autor: $autor<br>";
        echo "Tipo: $tipo<br>";
        echo "ID: $id<br>";
        echo "<br>";
    }
    }
    }
    