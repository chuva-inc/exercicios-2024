<?php

namespace Galoa\ExerciciosPhp2022\War\GameManager;

use Galoa\ExerciciosPhp2022\War\GamePlay\Country\ComputerPlayerCountry;
use Galoa\ExerciciosPhp2022\War\GamePlay\Country\HumanPlayerCountry;

/**
 * Creates a list of countries for the game.
 */
class CountryList {

  /**
   * Creates a list of countries, with one human player
   *
   * @return \Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface[]
   *   A list of countries.
   */
  public static function createWorld(): array {
    $map = [
      'Gondor' => ['Enedwaith', 'Rohan', 'Harondor', 'Mordor'],
      'Enedwaith' => ['Gondor', 'Rohan'],
      'Rohan' => ['Enedwaith', 'Gondor', 'Rhovanion'],
      'Rhovanion' => ['Rohan'],
      'Harondor' => ['Gondor', 'Mordor'],
      'Mordor' => ['Harondor', 'Gondor'],
    ];

    $countries = [];
    foreach (array_keys($map) as $index => $name) {
      if ($index) {
        $countries[$name] = new ComputerPlayerCountry($name);
        readline_add_history($name);
      }
      else {
        $countries[$name] = new HumanPlayerCountry($name);
      }
    }

    foreach ($map as $name => $neighborNames) {
      $countries[$name]->setNeighbors(array_map(function ($countryName) use ($countries) {
        return $countries[$countryName];
      }, $neighborNames));
    }

    return $countries;
  }

}
