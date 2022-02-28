<?php

namespace Galoa\ExerciciosPhp2022\War\GamePlay;

use Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface;

/**
 * Defines a class that will roll the dice and compute the winners of a battle.
 */
interface BattlefieldInterface {

  /**
   * Rolls the dice for a country.
   *
   * @param \Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface $country
   *   The country that is rolling the dice.
   * @param bool $isAtacking
   *   TRUE if the dice is being rolled by the attacker, FALSE if by the
   *   defender.
   *
   * @return int[]
   *   An array with values from 1-to-6. The array must have as many items as:
   *     - the number of troops of the country, when the defender is rolling
   *       the dice.
   *     - the number of troops of the country MINUS ONE, when the attacker is
   *       the one rolling the dice.
   */
  public function rollDice(CountryInterface $country, bool $isAtacking): array;

  /**
   * Computes the winners and losers of a battle.
   *
   * @param \Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface $attackingCountry
   *   The country that is attacking.
   * @param int[] $attackingDice
   *   The number
   * @param \Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface $defendingCountry
   *   The country that is defending from the attack.
   */
  public function computeBattle(CountryInterface $attackingCountry, array $attackingDice, CountryInterface $defendingCountry, array $defendingDice): void;

}
