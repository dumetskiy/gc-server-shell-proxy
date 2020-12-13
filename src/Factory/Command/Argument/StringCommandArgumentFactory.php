<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Factory\Command\Argument;

use GamersClub\ServerShellProxy\DTO\Command\AbstractCommandArgumentDTO;
use GamersClub\ServerShellProxy\DTO\Command\BooleanCommandArgumentDTO;

class StringCommandArgumentFactory extends AbstractCommandArgumentFactory
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
     * @return string
     */
    protected function prepareArgumentValue($argumentValue, string $argumentName): string
    {
        return (string) $argumentValue;
    }
}