<?php
declare(strict_types=1);

namespace TripSorter\Tests\DataTransformer;

use PHPUnit\Framework\TestCase;
use TripSorter\Cards\{CardInterface, BusCard, FlightCard, TrainCard};
use TripSorter\Cards\FlightBaggage;
use TripSorter\DataTransformer\CardTransformer;

class CardTransformerTest extends TestCase
{
    /**
     * @dataProvider arrayToObjectProvider
     * @param array $data
     * @param CardInterface $expected
     */
    public function testArrayToObject(array $data, CardInterface $expected) : void
    {
        $transformer = new CardTransformer();
        $result = $transformer->arrayToObject($data);

        $this->assertEquals($expected, $result);
    }

    public function arrayToObjectProvider() : array
    {
        $data1 = [
            'ref_number' => 'testbus1',
            'departure' => 'city B',
            'arrival' => 'city C',
            'type' => 'bus',
        ];

        $data2 = [
            'ref_number' => 'testflight1',
            'departure' => 'city C',
            'arrival' => 'city D',
            'gate' => 'GATE A',
            'seat' => '111',
            'type' => 'plane',
            'counter' => '3',
        ];

        $data3 = [
            'ref_number' => 'testtrain1',
            'departure' => 'city A',
            'arrival' => 'city B',
            'seat' => '0213',
            'type' => 'train',
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

        return [
            [$data1, $trip1],
            [$data2, $trip2],
            [$data3, $trip3],
        ];
    }
}