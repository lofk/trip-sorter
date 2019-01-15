<?php
declare(strict_types=1);

namespace TripSorter\CardsList;

use TripSorter\Cards\CardInterface;

/**
 * Class AbstractCardsList
 * @package TripSorter\CardsList
 */
abstract class AbstractCardsList implements CardsListInterface
{
    /**
     * @var array
     */
    private $cardsList;

    /**
     * @param CardInterface $card
     */
    public function addCard(CardInterface $card) : void
    {
        $this->cardsList[] = $card;
    }

    /**
     * @return array
     */
    public function getCards() : array
    {
        return $this->cardsList;
    }

    /**
     * @param array $cards
     */
    public function setCards(array $cards) : void
    {
        $this->cardsList = $cards;
    }
}