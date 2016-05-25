# Composite Card Factory

In this problem you will create an application that prints all of the cards in a standard 52 card deck using the [composite](https://en.wikipedia.org/wiki/Composite_pattern) and [factory](https://en.wikipedia.org/wiki/Factory_method_pattern) patterns.

In Card.php you will notice a few things are already defined for you.

```
abstract class CardData
{
	...
}

abstract class Card extends CardData
{
	...
}
```
 
- Create 4 new classes called `Diamond`, `Spade`, `Heart`, `Club` that will inherit functions and properties off of the `Card` abstract class. These classes will be the leaves of the `CardData` class. Define properties in these new classes that are expected by the `Card` abstract class.

- Complete another class called `Deck` that inherits from `CardData` called  that acts as the composite for the `CardData` class. `Deck` should contain 4 functions and 3 of these functions are required by `CardData`. **Do not modify the abstract class to satisfy the class requirements**. Follow the comments in Card.php to figure out what these functions should be doing.

In CardFactory.php you will add to the factory class that will create a `Deck` filled all 52 cards you'd find in a normal playing card deck called `createCardDeck()`. The values of the cards are already defined for you in the `$values` property on the class.

1. Create cards with each of the values defined in `$values` for each suit. Each suit should have every card value from `Two` to `Ace`.
2. Create a deck that has all of the cards you just created and return it.

To test if you were successful, run the TestCards.php file. Your output should look like this:

```
This card is the Two of Diamond. This card is the Three of Diamond. This card is the Four of Diamond. This card is the Five of Diamond. This card is the Six of Diamond. This card is the Seven of Diamond. This card is the Eight of Diamond. This card is the Nine of Diamond. This card is the Ten of Diamond. This card is the Jack of Diamond. This card is the Queen of Diamond. This card is the King of Diamond. This card is the Ace of Diamond. This card is the Two of Spade. This card is the Three of Spade. This card is the Four of Spade. This card is the Five of Spade. This card is the Six of Spade. This card is the Seven of Spade. This card is the Eight of Spade. This card is the Nine of Spade. This card is the Ten of Spade. This card is the Jack of Spade. This card is the Queen of Spade. This card is the King of Spade. This card is the Ace of Spade. This card is the Two of Heart. This card is the Three of Heart. This card is the Four of Heart. This card is the Five of Heart. This card is the Six of Heart. This card is the Seven of Heart. This card is the Eight of Heart. This card is the Nine of Heart. This card is the Ten of Heart. This card is the Jack of Heart. This card is the Queen of Heart. This card is the King of Heart. This card is the Ace of Heart. This card is the Two of Club. This card is the Three of Club. This card is the Four of Club. This card is the Five of Club. This card is the Six of Club. This card is the Seven of Club. This card is the Eight of Club. This card is the Nine of Club. This card is the Ten of Club. This card is the Jack of Club. This card is the Queen of Club. This card is the King of Club. This card is the Ace of Club.

```
