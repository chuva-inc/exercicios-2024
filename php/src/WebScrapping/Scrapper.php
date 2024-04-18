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
    $paperXPath = "//a[@class='paper-card p-lg bd-gradient-left']";
    $titleXPath = ".//h4[@class='my-xs paper-title']";
    $typeXPath = ".//div[@class='tags mr-sm']";
    $idXPath = ".//div[@class='volume-info']";
    $authorXPath = ".//div[@class='authors']/span";
    
    // juntando os dados de cada paper em uma unica variavel $paperNodes
    $papersNodes = $xpath->query($paperXPath);

    // criando um array para armazenar os papers
    $papers = [];
    
 
    // usando foreach para iterar em todos os papers
    foreach ($papersNodes as $paperNode) {
      $title = $xpath->query($titleXPath, $paperNode)->item(0)->nodeValue;
      $type = $xpath->query($typeXPath, $paperNode)->item(0)->nodeValue;
      $id = $xpath->query($idXPath, $paperNode)->item(0)->nodeValue;
    
      //inicializa array para armazenar infos do(s) autor(es)
      $authors = [];

         //extraindo as informações dos autores de cada paper
        $authorsNodes = $xpath->query($authorXPath, $paperNode);
        foreach ($authorsNodes as $authorNode) {
          //lendo o conteudo correto para o autor q esta sendo instanciado
          $author = $authorNode->nodeValue;
          //lendo também o conteudo correto da instituicao desse autor
          $institution = $authorNode->getAttribute('title');
          //atribuindo esses valores lidos para essa instancia de autor
          $authors[] = new Person($author, $institution);
        }

        // instanciado classe Paper com os dados extraídos e os autores
          $paper = new Paper($id, $title, $type, $authors);
              //passando todas as informações do array associativo para o array papers
        $papers[] = $paper;
           }

          //retorna todas as informações de todos os papers
           return $papers;
    }
    }
    