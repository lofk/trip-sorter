<?php
declare(strict_types=1);

namespace TripSorter\Exception;

/**
 * Class BrokenChainException
 * @package TripSorter\Exception
 */
final class BrokenChainException extends \Exception
{
    const BROKEN_CHAIN_EXCEPTION = 'Broken chain! Your boarding cards are not continuous.';

    public function __construct()
    {
        parent::__construct(self::BROKEN_CHAIN_EXCEPTION);
    }
}