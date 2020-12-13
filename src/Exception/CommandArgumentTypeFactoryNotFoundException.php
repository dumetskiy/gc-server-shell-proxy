<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Exception;

class CommandArgumentTypeFactoryNotFoundException extends \Exception
{
    protected const DEFAULT_MESSAGE = 'Configuration for requested command argument type not found.';

    /**
     * @param string $commandArgumentType
     *
     * @return $this
     */
    public static function createFromCommandArgumentTypeName(string $commandArgumentType): self
    {
        return new self(sprintf('No configuration found for command argument type "%s"', $commandArgumentType));
    }
}