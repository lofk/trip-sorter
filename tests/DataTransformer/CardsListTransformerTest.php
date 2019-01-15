<?php
declare(strict_types=1);

namespace TripSorter\Tests\DataTransformer;

use PHPUnit\Framework\TestCase;
use TripSorter\CardsList\{CardsListInterface, InputCardsList};
use TripSorter\Cards\{BusCard, FlightCard, TrainCard};
use TripSorter\Cards\FlightBaggage;
use TripSorter\DataTransformer\CardsListTransformer;

class CardsListTransformerTest extends TestCase
{
    /**
     * @dataProvider arrayToObjectProvider
     * @param array $data
     * @param CardsListInterface $expected
     */
    public function testArrayToObject(array $data, CardsListInterface $expected) : void
    {
        $transformer = new CardsListTransformer();
        $result = $transformer->arrayToObject($data);

        $this->assertEquals($expected, $result);
    }

    public function arrayToObjectProvider() : array
    {
        return [
            $this->listWith3Trips(),
        ];
    }

    private function listWith3Trips() : array
    {
        $list = [
            [
                'ref_number' => 'testbus1',
                'departure' => 'city B',
                'arrival' => 'city C',
                'type' => 'bus',
            ],
            [
                'ref_number' => 'testflight1',
                'departure' => 'city C',
                'arrival' => 'city D',
                'gate' => 'GATE A',
                'seat' => '111',
                'type' => 'plane',
                'counter' => '3',
            ],
            [
                'ref_number' => 'testtrain1',
                'departure' => 'city A',
                'arrival' => 'city B',
                'seat' => '0213',
                'type' => 'train',
            ]
        ];

        $trip1 = new BusCard();
        $trip1->setRefNumber('testbus1');
        $trip1->setDeparture('city B');
        $trip1->setArrival('city C');

        $trip2 = new FlightCard();
        $trip2->setRefNumber('testflight1');
        $trip2->setDeparture('city C');
        $trip2->setArrival('city D');
        $trip2->setGate('GATE A');
        $trip2->setSeat('111');
        $baggage = new FlightBaggage();
        $baggage->setCounter('3');
        $trip2->setBaggage($baggage);

        $trip3 = new TrainCard();
        $trip3->setRefNumber('testtrain1');
        $trip3->setDeparture('city A');
        $trip3->setArrival('city B');
        $trip3->setSeat('0213');

        $expected = new InputCardsList();
        $expected->setCards([$trip1, $trip2, $trip3]);

        return [
            $list,
            $expected
        ];
    }
}