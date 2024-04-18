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
    
 
    // usando foreach para iterar em todos os papers
    foreach ($papersNodes as $paperNode) {
      $titulo = $xpath->query($tituloXPath, $paperNode)->item(0)->nodeValue;
      $tipo = $xpath->query($tipoXPath, $paperNode)->item(0)->nodeValue;
      $id = $xpath->query($idXPath, $paperNode)->item(0)->nodeValue;
    
      //inicializa array para armazenar infos do(s) autor(es)
      $autoresArray = [];

         //extraindo as informações dos autores de cada paper
        $autoresNodes = $xpath->query($autorXPath, $paperNode);
        foreach ($autoresNodes as $autorNode) {
          //lendo o conteudo correto para o autor q esta sendo instanciado
          $autor = $autorNode->nodeValue;
          //lendo também o conteudo correto da instituicao desse autor
          $instituicao = $autorNode->getAttribute('title');
          //atribuindo esses valores lidos para essa instancia de autor
          $autoresArray[] = ['nome' => $autor, 'instituicao' => $instituicao];
        }

                // criando vetor associativo com as informaçoes do paper q ta sendo lido na iteraçao atual
                $paperInfo = [
                  'titulo' => $titulo,
                  'id' => $id,
                  'tipo' => $tipo,
                  'autores' => $autoresArray,
              ];

           }
    }
    }
    