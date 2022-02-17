<?php

namespace Galoa\ExerciciosPhp2022\War\GamePlay\Country;

/**
 * Defines a country, that is also a player.
 */
interface CountryInterface {

  /**
   * Gets the name of a country.
   *
   * There are no two countries with the same name.
   *
   * @return string
   *   The name of the country.
   */
  public function getName(): string;

  /**
   * Sets the neighbors of this country.
   *
   * This method is run ONLY ONCE on the game creation. You must handle the
   * addition of additional neighbors in the conquer() method.
   *
   * @param \Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface[] $neighbors
   *   An array of countries that neighbor this country, indexed by their names.
   */
  public function setNeighbors(array $neighbors): void;

  /**
   * Lists the neighbors of a country.
   *
   * When the country is initialized, it receives an array of neighbours by the
   * game manager. Before any round, this array is exactly what getNeighbors()
   * should return.
   *
   * When a country conquers another, it should add this country neighbors to
   * its own. You should make sure, however, that you do NOT duplicated
   * countries in the array, nor return the current country as itself.
   *
   * @return \Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface[]
   *   The country's neighbors.
   */
  public function getNeighbors(): array;

  /**
   * Returns how many troops there currently are in this country.
   *
   * @return int
   *   The number of troops this country has.
   */
  public function getNumberOfTroops(): int;

  /**
   * Determines whether the player has been conquered.
   *
   * When a country is conquered, its object is not destroyed but it will be
   * flagged as "conquered", so that the game manager knows it will no longer be
   * playing. Your code should handle this flag and return the information
   * properly.
   *
   * @return bool
   *   If this country has been conquered by someone else, this method will
   *   return TRUE.
   */
  public function isConquered(): bool;

  /**
   * Called when, after a battle, the defending country end up with 0 troops.
   *
   * Here, you must register the neighbors of the conquered country as your own.
   *
   * @param \Galoa\ExerciciosPhp2022\War\GamePlay\Country\CountryInterface $conqueredCountry
   *   The country that has just been conquered.
   */
  public function conquer(CountryInterface $conqueredCountry): void;

  /**
   * Decreases the number of troops in this country by a given number.
   *
   * @param int $killedTroops
   *   The number of troops killed in battle.
   */
  public function killTroops(int $killedTroops): void;

}
