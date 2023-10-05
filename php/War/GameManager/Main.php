<?php

namespace Galoa\ExerciciosPhp2022\War\GameManager;

/**
 * ..........................
 */
class Main {

  /**
   * Main runner of the game UI.
   */
  public static function run(): void {
    print "#########################################\n";
    print "### Bem vindo ao jogo de War da Chuva ###\n";
    print "#########################################\n";

    $game = Game::create();
    $game->play();
    $game->results();

    print "\n";
  }

}
