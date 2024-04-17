<?php

namespace Chuva\Php\WebScrapping;

require_once '../vendor/box/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function gerarPlanilha(): void {

  $file = 'planilhaProceedings.xlsx';

  $writer = WriterEntityFactory::createXLSXWriter();
  $writer->openToBrowser($file);

  // Escrevendo cabecalho
  $cabecalho = ['ID', 'Title', 'Type', 'Author 1', 'Author 1 Institution', 'Author 2', 'Author 2 Institution', 'Author 3', 'Author 3 Institution', 'Author 4', 'Author 4 Institution', 'Author 5', 'Author 5 Institution', 'Author 6', 'Author 6 Institution', 'Author 7', 'Author 7 Institution', 'Author 8', 'Author 8 Institution', 'Author 9', 'Author 9 Institution','Author 10', 'Author 10 Institution'];

  // Adiciona uma nova linha com os valores
  $rowFromValues = WriterEntityFactory::createRowFromArray($cabecalho);
  $writer->addRow($rowFromValues); 

  // Utilizando DOMDocument para acessar o conteudo da pagina
  $html = file_get_contents(__DIR__ . '/../../assets/origin.html');
  $dom = new \DOMDocument;

  // Carregando o HTML da pagina
  @$dom->loadHTML($html);

  // Criacao de um objeto DOMXPath
  $xpath = new \DOMXPath($dom);

  // Pega as informacoes de tudo dentros dos elementos ancora da pagina
  $links = $xpath->query("//a[contains(@class, 'paper-card')]");

  // Declaracao de variaveis
  $count = 0;

  // Para cada elemento link dentro do elemento links
  foreach ($links as $link){

      // Transforma a variável autores em array
      $informacoes = array();

      // Declarao de variaveis
      $i=0;

      // Selecionar a div com classe "volume-info"
      $ID = $xpath->query("//div[contains(@class, 'volume-info')]")->item($count);
      $ID = $ID->nodeValue;

      // Selecionar a h4 com classe "paper-title"
      $titulo = $xpath->query("//h4[contains(@class, 'paper-title')]")->item($count);
      $titulo = $titulo->nodeValue;

      // Selecionar a div com classe "tags mr-sm"
      $type = $xpath->query("//div[contains(@class, 'tags mr-sm')]")->item($count);
      $type = $type->nodeValue;

      // Pega as informacoes de todos os elementos span dentro do elemento ancora
      $nomes = $link->getElementsByTagName('span');

      $autores = array();

      // Para nome de autor executa
      foreach ($nomes as $nome) {

          $instituicao = $nome->getAttribute('title');
          $author = $nome->nodeValue;

          // Adiciona o nome do autor e sua instituição ao array de autores
          $autores[] = $author;
          $autores[] = $instituicao;

          $i++;
      }

      // Adicionando informações do artigo e autores em uma única linha
      $informacoes = array_merge(array($ID,$titulo,$type), $autores);

      // Criando uma única linha para adicionar ao escritor
      $insert = WriterEntityFactory::createRowFromArray($informacoes);
      $writer->addRow($insert);
      $count++;
  }
    
  $writer->close();
  }

}
$gerar = new Main();
$gerar->gerarPlanilha();