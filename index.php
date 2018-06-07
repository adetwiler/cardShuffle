<?php

class Deck
{
  const CARDS = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'K', 'Q', 'A'];
  const SUITS = ['S', 'H', 'D', 'C'];

  private $cardsAvailable = [];
  private $cardsDealt = [];

  function __construct()
  {
    self::buildCards();
    self::shuffle();
  }

  private function setupCards()
  {
    if (count($this->cardsDealt) > 0)
    {
      $this->cardsAvailable = $this->cardsDealt;
      $this->cardsDealt = [];
    }
    self::shuffle();
  }

  private function buildCards()
  {
    $this->cardsAvailable = [];
    foreach(self::CARDS as $card)
    {
      foreach(self::SUITS as $suit)
      {
        array_push($this->cardsAvailable, $card . $suit);
      }
    }
  }

  private function shuffle()
  {
    shuffle($this->cardsAvailable);
  }

  function dealCards()
  {
    print("<p>");
    while (count($this->cardsAvailable) > 0)
    {
      $drawnCard = $this->cardsAvailable[0];
      array_push($this->cardsDealt, $drawnCard);
      array_shift($this->cardsAvailable);
      print($drawnCard." ");
    }
    print("</p>");
    self::setupCards();
  }
}

$deck = new Deck();

// Do it for 5 iterations so we don't have an infinite loop
for ($i = 1; $i <= 5; $i++)
{
  $deck->dealCards();
} 
