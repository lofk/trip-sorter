<?php
declare(strict_types=1);

namespace TripSorter\CardsList;

use TripSorter\Cards\CardInterface;

/**
 * Class ResultCardsList
 * @package TripSorter\CardsList
 */
class ResultCardsList extends AbstractCardsList
{
    const FINAL_MESSAGE = 'You have arrived at your final destination.';

    /**
     * @return string
     */
    public function renderText() : string
    {
        $text = '';
        foreach($this->getCards() as $card) {
            /** @var CardInterface $card */
            $text .= $card->getDescription() . PHP_EOL;
            if (method_exists($card, 'getBaggage') && $card->getBaggage()) {
                $text .= $card->getBaggage()->getDescription() . PHP_EOL;
            }
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
            /** @var CardInterface $card */
            $html .= "<li>{$card->getDescription()}</li>\n";
            if (method_exists($card, 'getBaggage') && $card->getBaggage()) {
                $html .= "<li>{$card->getBaggage()->getDescription()}</li>\n";
            }
        }
        $text = self::FINAL_MESSAGE;
        $html .= "<li>{$text}</li>\n";
        $html .= "</ul>\n";

        return $html;
    }
}