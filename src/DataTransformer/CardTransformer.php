<?php
declare(strict_types=1);

namespace TripSorter\DataTransformer;

use TripSorter\Cards\{CardInterface, FlightCard, TrainCard};

/**
 * Class CardTransformer
 * @package TripSorter\Transformer
 */
class CardTransformer extends AbstractCardTransformer
{
    /**
     * @param array $data
     * @return CardInterface
     */
    public function arrayToObject(array $data)
    {
        $card = $this->getFactory()->getCard($data);
        $card->setRefNumber($data['ref_number'] ?? '');
        $card->setDeparture($data['departure'] ?? '');
        $card->setArrival($data['arrival'] ?? '');
        if ($card instanceof TrainCard || $card instanceof FlightCard) {
            $card->setSeat($data['seat'] ?? '');
        }
        if ($card instanceof FlightCard) {
            $card->setGate($data['gate'] ?? '');
            if (isset($data['counter'])) {
                $card->getBaggage()->setCounter($data['counter'] ?? '');
            }
        }

        return $card;
    }
}