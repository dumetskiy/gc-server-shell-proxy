<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Factory\Command\Argument;

use GamersClub\ServerShellProxy\DTO\Command\AbstractCommandArgumentDTO;

interface CommandArgumentFactoryInterface
{
    /**
     * @param string $commandArgumentKey
     * @param array $commandArgumentConfig
     *
     * @return AbstractCommandArgumentDTO|null
     */
    public function createCommandArgument(string $commandArgumentKey, array $commandArgumentConfig): ?AbstractCommandArgumentDTO;
}