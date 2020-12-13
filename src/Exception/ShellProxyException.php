<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Exception;

use Throwable;

class ShellProxyException extends \Exception
{
    protected const DEFAULT_MESSAGE = '';

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = null, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message ?? static::DEFAULT_MESSAGE, $code, $previous);
    }
}