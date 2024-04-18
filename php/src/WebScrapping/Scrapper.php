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
    $tituloXPath = "//h4[@class='my-xs paper-title']";
    $instituicaoXPath = "//span[@title='institution']";
    $autorXPath = "//span[@title='person']";
    $tipoXPath = "//div[@class='tags mr-sn']";
    $idXPath = "//div[@class='volume-info']";

    //queries do xpath
    $titulos = $xpath->query($tituloXPath);
    $instituicoes = $xpath->query($instituicaoXPath);
    $autores = $xpath->query($autorXPath);
    $tipos = $xpath->query($tipoXPath);
    $ids = $xpath->query($idXPath);

    //for que vai iterar sobre cada paper e identificar os atributos q queremos
    for ($i = 0; $i < $titulos->length; $i++) { 
        $titulo = $titulos->item($i)->nodeValue;
        $instituicao = $instituicoes->item($i)->nodeValue;
        $autor = $autores->item($i)->nodeValue;
        $tipo = $tipos->item($i)->nodeValue;
        $id = $ids->item($i)->nodeValue;

        //imprimindo os dados q estao sendo lidos
      echo "Título: $titulo<br>";
      echo "Instituição: $instituicao<br>";
      echo "Autor: $autor<br>";
      echo "Tipo: $tipo<br>";
      echo "ID: $id<br>";
      echo "<br>";

    }
}
}
  
