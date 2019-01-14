<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TripSorter\AppSorter;
use TripSorter\Cards\{BusCard, FlightCard, TrainCard};
use TripSorter\CardsList\{CardsListInterface, InputCardsList, ResultCardsList};

final class AppSorterTest extends TestCase
{
    /**
     * @dataProvider cardsProvider
     * @param CardsListInterface $data
     * @param CardsListInterface $expected
     */
    public function testSort(CardsListInterface $data, CardsListInterface $expected) : void
    {
        $sorter = new AppSorter();
        $result = $sorter->sort($data);
        $this->assertInstanceOf($result, CardsListInterface::class);
        $this->assertEquals($result->asArray(), $expected);
    }

    public function cardsProvider() : array
    {
        return [
            $this->case1(),
            $this->case2()
        ];
    }

    private function case1() : array
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
        $list->addCard($trip1);
        $list->addCard($trip2);
        $list->addCard($trip3);

        $expectedList = new ResultCardsList();
        $expectedList->addCard($trip3);
        $expectedList->addCard($trip1);
        $expectedList->addCard($trip2);

        return [
            $list,
            $expectedList
        ];
    }

    private function case2() : array
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
        $list->addCard($trip1);
        $list->addCard($trip2);
        $list->addCard($trip3);
        $list->addCard($trip4);
        $list->addCard($trip5);

        $expectedList = new ResultCardsList();
        $expectedList->addCard($trip4);
        $expectedList->addCard($trip1);
        $expectedList->addCard($trip2);
        $expectedList->addCard($trip5);
        $expectedList->addCard($trip3);

        return [
            $list,
            $expectedList
        ];
    }
}