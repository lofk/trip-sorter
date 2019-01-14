<?php
declare(strict_types=1);

namespace TripSorter\CardsList;

use TripSorter\Cards\BoardingCard;

/**
 * Class ResultCardsList
 * @package TripSorter\CardsList
 */
class ResultCardsList extends CardsList
{
    const FINAL_MESSAGE = 'You have arrived at your final destination.';

    /**
     * @return string
     */
    public function renderText() : string
    {
        $text = '';
        foreach($this->getCards() as $card) {
            /** @var BoardingCard $card */
            $text .= $card->getDescription() . PHP_EOL;
        }
        $text .= self::FINAL_MESSAGE . PHP_EOL;

        return $text;
    }

    /**
     * @return string
     */
    public function renderHtml() : string
    {
        $html = "<ul>\n";
        foreach($this->getCards() as $card) {
            /** @var BoardingCard $card */
            $html .= "<li>{$card->getDescription()}</li>\n";
        }
        $text = self::FINAL_MESSAGE;
        $html .= "<li>{$text}</li>\n";
        $html .= "</ul>\n";

        return $html;
    }
}