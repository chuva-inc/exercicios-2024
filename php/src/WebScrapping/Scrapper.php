<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {

    $a_elements = $dom->getElementsByTagName('a');
    $data_title = [];
    $data_authors = [];
    $data_id = [];
    $data_type =[];
    $data_inst = [];
    $num_integrantes_grupo = [];
    $inicio = 0;

    //Retorna o titulo dos artigos
    foreach ($a_elements as $a_element) {
      $h4_elements = $a_element->getElementsByTagName('h4');
      foreach ($h4_elements as $h4_element) {
        $data_title[] = $h4_element->textContent;
      }
    }

    //Retorna os nomes dos authores_separados
    foreach ($a_elements as $a_element) {
      $div_elements = $a_element->getElementsByTagName('div');
      foreach ($div_elements as $div_element) {
        if ($div_element->getAttribute('class') === 'authors') {
            $span_elements = $div_element->getElementsByTagName('span');
            foreach ($span_elements as $span_element) {
              $data_authors[] = $span_element->textContent;
          }
        }
      }
    }

    //Retorna a quantidade de membros por grupo
    foreach ($a_elements as $a_element) {
      $div_elements = $a_element->getElementsByTagName('div');
      foreach ($div_elements as $div_element) {
        if ($div_element->getAttribute('class') === 'authors') {
            $intr_1 = $div_element->textContent;
            $intr_2 = explode(';', $intr_1);
            $number_author_grupo = count($intr_2);
            $number_author_grupo = $number_author_grupo - 1;
            $num_integrantes_grupo[] = $number_author_grupo;
            
        }
      }
    }
    //Retorna os ids dos artigos
    foreach ($a_elements as $a_element) {
      $div_elements = $a_element->getElementsByTagName('div');
      foreach ($div_elements as $div_element) {
        if ($div_element->getAttribute('class') === 'tags flex-row mr-sm') {
            $data_id[] = $div_element->textContent;
        }
      }
    }

    //Retorna os tipos dos arquivos
    foreach ($a_elements as $a_element) {
      $div_elements = $a_element->getElementsByTagName('div');
      foreach ($div_elements as $div_element) {
        if ($div_element->getAttribute('class') === 'tags mr-sm') {
            $data_type[] = $div_element->textContent;
        }
      }
    }


    //Retorna os nomes das instituicoes
    foreach ($a_elements as $a_element) {
      $div_elements = $a_element->getElementsByTagName('div');
      foreach ($div_elements as $div_element) {
        if ($div_element->getAttribute('class') === 'authors') {
            $span_elements = $div_element->getElementsByTagName('span');
            foreach ($span_elements as $span_element) {
              if ($span_element->hasAttribute('title')) {
                $title_value = $span_element->getAttribute('title');
                $data_inst[] = $title_value;
            }
          }
        }
      }
    }

    $work_counter = count($data_id);
    $authors_counter = count($data_authors);
    $data_final = [];
    //Montando o array final
    for($i = 0; $i < $work_counter; $i++){
      $data_final[$i] = [];
      //id, titulo e tipo do trabalho
      array_push($data_final[$i], $data_id[$i], $data_title[$i], $data_type[$i]);
      //for que adiciona os autores e suas instituicoes em seus devidos trabalhos
      for($j = $inicio; $j < $inicio + $num_integrantes_grupo[$i]; $j++){
        array_push($data_final[$i], $data_authors[$j], $data_inst[$j]);
      }
      $inicio += $num_integrantes_grupo[$i];

    }
    return [
      $data_final
    ];
  }

}
