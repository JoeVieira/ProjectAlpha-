<?php

/**
 * Use these three abstract classes that are defined to create a solution to the problem in README.md
 *  -Do not modify the CardData abstract class to satisfy class requirements.-
 */

abstract class CardData
{
	abstract function getCard();
	abstract function getCardCount();
	abstract function printCardInfo();
}

abstract class Card extends CardData {}

abstract class Deck extends CardData {}