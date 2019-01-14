<?php

namespace TripSorter\CardsList;


use TripSorter\Cards\BoardingCard;

interface CardsListInterface
{
    public function addCard(BoardingCard $card) : void;

    public function getCards() : array;

    public function setCards(array $cards) : void;
}