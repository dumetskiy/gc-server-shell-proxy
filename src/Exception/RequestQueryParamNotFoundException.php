<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Exception;

class RequestQueryParamNotFoundException extends \Exception
{
    protected const DEFAULT_MESSAGE = 'Required query param is missing.';

    /**
     * @param string $queryParamName
     *
     * @return $this
     */
    public static function createFromQueryParamName(string $queryParamName): self
    {
        return new self(sprintf('Required query param "%s" is missing', $queryParamName));
    }
}