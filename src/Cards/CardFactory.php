<?php
declare(strict_types=1);

namespace TripSorter\Cards;

/**
 * Class CardFactory
 * @package TripSorter\Cards
 */
class CardFactory
{
    const BUS_TYPE = 'bus';
    const TRAIN_TYPE = 'train';
    const PLANE_TYPE = 'plane';

    /**
     * @param array $data
     * @return CardInterface
     */
    public function getCard(array $data) : CardInterface
    {
        switch($data['type']) {
            case self::BUS_TYPE :
                return new BusCard();
                break;

            case self::TRAIN_TYPE:
                return new TrainCard();
                break;

            case self::PLANE_TYPE:
                $flightCard = new FlightCard();
                if (isset($data['counter'])) {
                    $flightCard->setBaggage(new FlightBaggage());
                }

                return $flightCard;
                break;

            default:
                return null;
        }
    }
}