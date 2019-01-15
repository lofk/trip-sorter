<?php
declare(strict_types=1);

namespace TripSorter\Tests;

use PHPUnit\Framework\TestCase;
use TripSorter\CardsList\InputCardsList;
use TripSorter\Cards\{CardInterface, BusCard, FlightCard, TrainCard};

final class InputCardsListTest extends TestCase
{
    /**
     * @dataProvider departuresProvider
     * @param InputCardsList $cardsList
     * @param array $expected
     */
    public function testGetDepartures(InputCardsList $cardsList, array $expected) : void
    {
        $departures = $cardsList->getDepartures();
        $this->assertEquals($departures, $expected);
    }

    /**
     * @dataProvider arrivalsProvider
     * @param InputCardsList $cardsList
     * @param array $expected
     */
    public function testGetArrivals(InputCardsList $cardsList, array $expected) : void
    {
        $arrivals = $cardsList->getArrivals();
        $this->assertEquals($arrivals, $expected);
    }

    /**
     * @dataProvider startPointProvider
     * @param InputCardsList $cardsList
     * @param string $expected
     */
    public function testGetStartPoint(InputCardsList $cardsList, string $expected) : void
    {
        $startPoint = $cardsList->getStartPoint();
        $this->assertEquals($startPoint, $expected);
    }

    /**
     * @dataProvider findByDepartureProvider
     * @param InputCardsList $cardsList
     * @param string $departure
     * @param CardInterface $expected
     */
    public function testFindByDeparture(InputCardsList $cardsList, string $departure, CardInterface $expected) : void
    {
        $card = $cardsList->findByDeparture($departure);
        $this->assertEquals($card, $expected);
    }

    public function departuresProvider()
    {
        return [
            $this->departuresWith3Trips(),
            $this->departuresWith5Trips(),
        ];
    }

    public function arrivalsProvider()
    {
        return [
            $this->arrivalsWith3Trips(),
            $this->arrivalsWith5Trips(),
        ];
    }

    public function startPointProvider()
    {
        return [
            $this->startPointWith3Trips(),
            $this->startPointWith5Trips(),
        ];
    }

    public function findByDepartureProvider()
    {
        return [
            $this->findByDepartureWith3Trips(),
            $this->findByDepartureWith5Trips(),
        ];
    }

    private function departuresWith3Trips() : array
    {
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

        $trip3 = new TrainCard();
        $trip3->setRefNumber('testtrain1');
        $trip3->setDeparture('city A');
        $trip3->setArrival('city B');
        $trip3->setSeat('0213');

        $list = new InputCardsList();
        $list->setCards([$trip1, $trip2, $trip3]);

        $expected = ['city B', 'city C', 'city A'];

        return [
            $list,
            $expected
        ];
    }

    private function departuresWith5Trips() : array
    {
        $trip1 = new BusCard();
        $trip1->setRefNumber('ref1');
        $trip1->setDeparture('city B');
        $trip1->setArrival('city C');

        $trip2 = new FlightCard();
        $trip2->setRefNumber('ref2');
        $trip2->setDeparture('city C');
        $trip2->setArrival('city D');
        $trip2->setGate('GATE A');
        $trip2->setSeat('111');

        $trip3 = new FlightCard();
        $trip3->setRefNumber('ref3');
        $trip3->setDeparture('city E');
        $trip3->setArrival('city F');
        $trip3->setGate('GATE A');
        $trip3->setSeat('888');

        $trip4 = new TrainCard();
        $trip4->setRefNumber('ref4');
        $trip4->setDeparture('city A');
        $trip4->setArrival('city B');
        $trip4->setSeat('0213');

        $trip5 = new TrainCard();
        $trip5->setRefNumber('ref5');
        $trip5->setDeparture('city D');
        $trip5->setArrival('city E');
        $trip5->setSeat('222');

        $list = new InputCardsList();
        $list->setCards([$trip1, $trip2, $trip3, $trip4, $trip5]);

        $expected = ['city B', 'city C', 'city E', 'city A', 'city D'];

        return [
            $list,
            $expected
        ];
    }

    private function arrivalsWith3Trips() : array
    {
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

        $trip3 = new TrainCard();
        $trip3->setRefNumber('testtrain1');
        $trip3->setDeparture('city A');
        $trip3->setArrival('city B');
        $trip3->setSeat('0213');

        $list = new InputCardsList();
        $list->setCards([$trip1, $trip2, $trip3]);

        $expected = ['city C', 'city D', 'city B'];

        return [
            $list,
            $expected
        ];
    }

    private function arrivalsWith5Trips() : array
    {
        $trip1 = new BusCard();
        $trip1->setRefNumber('ref1');
        $trip1->setDeparture('city B');
        $trip1->setArrival('city C');

        $trip2 = new FlightCard();
        $trip2->setRefNumber('ref2');
        $trip2->setDeparture('city C');
        $trip2->setArrival('city D');
        $trip2->setGate('GATE A');
        $trip2->setSeat('111');

        $trip3 = new FlightCard();
        $trip3->setRefNumber('ref3');
        $trip3->setDeparture('city E');
        $trip3->setArrival('city F');
        $trip3->setGate('GATE A');
        $trip3->setSeat('888');

        $trip4 = new TrainCard();
        $trip4->setRefNumber('ref4');
        $trip4->setDeparture('city A');
        $trip4->setArrival('city B');
        $trip4->setSeat('0213');

        $trip5 = new TrainCard();
        $trip5->setRefNumber('ref5');
        $trip5->setDeparture('city D');
        $trip5->setArrival('city E');
        $trip5->setSeat('222');

        $list = new InputCardsList();
        $list->setCards([$trip1, $trip2, $trip3, $trip4, $trip5]);

        $expected = ['city C', 'city D', 'city F', 'city B', 'city E'];

        return [
            $list,
            $expected
        ];
    }

    private function startPointWith3Trips() : array
    {
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

        $trip3 = new TrainCard();
        $trip3->setRefNumber('testtrain1');
        $trip3->setDeparture('city A');
        $trip3->setArrival('city B');
        $trip3->setSeat('0213');

        $list = new InputCardsList();
        $list->setCards([$trip1, $trip2, $trip3]);

        $expected = 'city A';

        return [
            $list,
            $expected
        ];
    }

    private function startPointWith5Trips() : array
    {
        $trip1 = new BusCard();
        $trip1->setRefNumber('ref1');
        $trip1->setDeparture('city B');
        $trip1->setArrival('city C');

        $trip2 = new FlightCard();
        $trip2->setRefNumber('ref2');
        $trip2->setDeparture('city C');
        $trip2->setArrival('city D');
        $trip2->setGate('GATE A');
        $trip2->setSeat('111');

        $trip3 = new FlightCard();
        $trip3->setRefNumber('ref3');
        $trip3->setDeparture('city E');
        $trip3->setArrival('city F');
        $trip3->setGate('GATE A');
        $trip3->setSeat('888');

        $trip4 = new TrainCard();
        $trip4->setRefNumber('ref4');
        $trip4->setDeparture('city A');
        $trip4->setArrival('city B');
        $trip4->setSeat('0213');

        $trip5 = new TrainCard();
        $trip5->setRefNumber('ref5');
        $trip5->setDeparture('city D');
        $trip5->setArrival('city E');
        $trip5->setSeat('222');

        $list = new InputCardsList();
        $list->setCards([$trip1, $trip2, $trip3, $trip4, $trip5]);

        $expected = 'city A';

        return [
            $list,
            $expected
        ];
    }

    private function findByDepartureWith3Trips() : array
    {
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

        $trip3 = new TrainCard();
        $trip3->setRefNumber('testtrain1');
        $trip3->setDeparture('city A');
        $trip3->setArrival('city B');
        $trip3->setSeat('0213');

        $list = new InputCardsList();
        $list->setCards([$trip1, $trip2, $trip3]);

        $departure = 'city B';

        return [
            $list,
            $departure,
            $trip1
        ];
    }

    private function findByDepartureWith5Trips() : array
    {
        $trip1 = new BusCard();
        $trip1->setRefNumber('ref1');
        $trip1->setDeparture('city B');
        $trip1->setArrival('city C');

        $trip2 = new FlightCard();
        $trip2->setRefNumber('ref2');
        $trip2->setDeparture('city C');
        $trip2->setArrival('city D');
        $trip2->setGate('GATE A');
        $trip2->setSeat('111');

        $trip3 = new FlightCard();
        $trip3->setRefNumber('ref3');
        $trip3->setDeparture('city E');
        $trip3->setArrival('city F');
        $trip3->setGate('GATE A');
        $trip3->setSeat('888');

        $trip4 = new TrainCard();
        $trip4->setRefNumber('ref4');
        $trip4->setDeparture('city A');
        $trip4->setArrival('city B');
        $trip4->setSeat('0213');

        $trip5 = new TrainCard();
        $trip5->setRefNumber('ref5');
        $trip5->setDeparture('city D');
        $trip5->setArrival('city E');
        $trip5->setSeat('222');

        $list = new InputCardsList();
        $list->setCards([$trip1, $trip2, $trip3, $trip4, $trip5]);

        $departure = 'city A';

        return [
            $list,
            $departure,
            $trip4
        ];
    }
}