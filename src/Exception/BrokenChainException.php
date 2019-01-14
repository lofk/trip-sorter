<?php

namespace TripSorter\Exception;


class BrokenChainException extends \Exception
{
    const BROKEN_CHAIN_EXCEPTION = 'Broken chain! Your boarding cards are not continuous.';

    public function __construct()
    {
        parent::__construct(self::BROKEN_CHAIN_EXCEPTION, 0, null);
    }
}