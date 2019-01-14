<?php

namespace TripSorter\CardsList;


use TripSorter\Cards\BoardingCard;

abstract class CardsList implements CardsListInterface
{
    /** @var array */
    private $cardsList;

    public function addCard(BoardingCard $card) : void
    {
        $this->cardsList[] = $card;
    }

    public function getCards() : array
    {
        return $this->cardsList;
    }

    public function setCards(array $cards) : void
    {
        $this->cardsList = $cards;
    }
}