<?php

require_once 'CardFactory.php';

$deck = CardFactory::createCardDeck();

$deck->printCardInfo();