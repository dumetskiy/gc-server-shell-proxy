<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Factory\Config;

use GamersClub\ServerShellProxy\DTO\Command\CommandDTO;

interface CommandFactoryInterface
{
    public function createCommand(array $commandConfig): CommandDTO;
}