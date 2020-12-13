<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Factory\Command\Argument;

use GamersClub\ServerShellProxy\DTO\Command\AbstractCommandArgumentDTO;
use GamersClub\ServerShellProxy\DTO\Command\BooleanCommandArgumentDTO;
use GamersClub\ServerShellProxy\Exception\InvalidCommandArgumentTypeException;

class BooleanCommandArgumentFactory extends AbstractCommandArgumentFactory
{
    /**
     * @return AbstractCommandArgumentDTO
     */
    protected function getCommandInstance(): AbstractCommandArgumentDTO
    {
        return new BooleanCommandArgumentDTO();
    }

    /**
     * @param $argumentValue
     * @param string $argumentName
     *
     * @return bool
     */
    protected function prepareArgumentValue($argumentValue, string $argumentName): bool
    {
        if (!in_array($argumentValue, ['true', 'false'])) {
            throw InvalidCommandArgumentTypeException::createFromArgumentName($argumentName);
        }

        return $argumentValue === 'true';
    }
}