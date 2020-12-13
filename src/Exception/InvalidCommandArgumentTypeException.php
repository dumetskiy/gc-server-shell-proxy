<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Exception;

class InvalidCommandArgumentTypeException extends \Exception
{
    protected const DEFAULT_MESSAGE = 'Required query param is missing.';

    /**
     * @param string $argumentName
     *
     * @return $this
     */
    public static function createFromArgumentName(string $argumentName): self
    {
        return new self(sprintf('Value provided for "%s" argument value is not acceptable', $argumentName));
    }
}