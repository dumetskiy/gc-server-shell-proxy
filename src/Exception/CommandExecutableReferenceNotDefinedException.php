<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Exception;

class CommandExecutableReferenceNotDefinedException extends \Exception
{
    protected const DEFAULT_MESSAGE = 'Command executable reference is not defined.';

    /**
     * @param string $commandName
     *
     * @return $this
     */
    public static function createFromCommandName(string $commandName): self
    {
        return new self(sprintf('No command executable set for command "%s"', $commandName));
    }
}