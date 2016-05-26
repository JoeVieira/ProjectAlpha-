# 52 Printout

In this problem you will create an application that prints all of the cards in a standard 52 card deck shuffled.

In Card.php you will notice a few things are already defined for you.

```
abstract class CardData
{
	abstract function getCard();
	abstract function getCardCount();
	abstract function printCardInfo();
}

abstract class Card extends CardData {}

abstract class Deck extends CardData {}
```
 
- Use these three abstract classes that are defined to create a solution to the problem. **Do not modify the CardData abstract class to satisfy class requirements.**

- Shuffle the cards so that they do not appear in order.

- The format you print your card data in is up to you, but it should end up looking something like this:

```
This card is the Two of Diamonds.
This card is the Ace of Spades.
This card is the Ten of Hearts.
This card is the Five of Clubs.
...

```
