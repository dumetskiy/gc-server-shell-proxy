<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Manager\Request;

use GamersClub\ServerShellProxy\Exception\CommandNameQueryParamNotFoundException;
use GamersClub\ServerShellProxy\Exception\RequestQueryParamNotFoundException;

class RequestManager
{
    /**
     * @param string $paramName
     *
     * @return bool
     */
    public function hasQueryParam(string $paramName): bool
    {
        return isset($_GET[$paramName]);
    }

    /**
     * @param string $paramName
     * @param bool $strict
     *
     * @return string|null
     */
    public function getQueryParam(string $paramName, bool $strict = true): ?string
    {
        if ($strict && !$this->hasQueryParam($paramName)) {
            throw RequestQueryParamNotFoundException::createFromQueryParamName($paramName);
        }

        return $_GET[$paramName] ?? null;
    }
}