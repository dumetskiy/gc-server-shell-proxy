<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Exception;

class CommandConfigurationNotFoundException extends \Exception
{
    protected const DEFAULT_MESSAGE = 'Configuration for requested command not found.';

    /**
     * @param string $commandName
     *
     * @return $this
     */
    public static function createFromCommandName(string $commandName): self
    {
        return new self(sprintf('No configuration found for command "%s"', $commandName));
    }
}