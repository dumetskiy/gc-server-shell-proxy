<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Factory\Command\Argument;

use GamersClub\ServerShellProxy\DTO\Command\AbstractCommandArgumentDTO;
use GamersClub\ServerShellProxy\DTO\Command\BooleanCommandArgumentDTO;
use GamersClub\ServerShellProxy\DTO\Command\IntegerCommandArgumentDTO;
use GamersClub\ServerShellProxy\Exception\InvalidCommandArgumentTypeException;

class IntegerCommandArgumentFactory extends AbstractCommandArgumentFactory
{
    /**
     * @return AbstractCommandArgumentDTO
     */
    protected function getCommandInstance(): AbstractCommandArgumentDTO
    {
        return new IntegerCommandArgumentDTO();
    }

    /**
     * @param $argumentValue
     * @param string $argumentName
     *
     * @return int
     */
    protected function prepareArgumentValue($argumentValue, string $argumentName): int
    {
        if (!is_numeric($argumentValue)) {
            throw InvalidCommandArgumentTypeException::createFromArgumentName($argumentName);
        }

        return (int) $argumentValue;
    }
}