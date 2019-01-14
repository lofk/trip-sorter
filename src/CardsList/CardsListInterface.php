<?php
declare(strict_types=1);

namespace TripSorter\CardsList;

use TripSorter\Cards\CardInterface;

/**
 * Interface CardsListInterface
 * @package TripSorter\CardsList
 */
interface CardsListInterface
{
    /**
     * @param CardInterface $card
     */
    public function addCard(CardInterface $card) : void;

    /**
     * @return array
     */
    public function getCards() : array;

    /**
     * @param array $cards
     */
    public function setCards(array $cards) : void;
}