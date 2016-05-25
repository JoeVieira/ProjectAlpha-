<?php

abstract class CardData
{
	abstract function getCard();
	abstract function getCardCount();
	abstract function printCardInfo();
}

abstract class Card extends CardData
{
	protected $value;

	public function __construct($value)
	{
		$this->value = $value;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function getSuit()
	{
		return $this->suit;
	}

	public function getCard()
	{
		return ['value' => $this->value, 'suit' => $this->suit];
	}

	public function getCardCount()
	{
		return 1;
	}

	public function printCardInfo()
	{
		echo "This card is the $this->value of $this->suit.".PHP_EOL;
	}
}

class Deck extends CardData
{
	/* array of Cards */
	protected $cards = [];

	/**
	 * adds a Card to the deck
	 */
	public function addCard($card)
	{

	}

	/**
	 * returns a call to getCard() on the first Card inserted into the deck
	 */
	public function getCard()
	{

	}

	/**
	 * returns the amount of Cards in the Deck
	 */
	public function getCardCount()
	{

	}

	/**
	 * calls printCardInfo() on all of the Cards in the deck
	 */
	public function printCardInfo()
	{

	}
}