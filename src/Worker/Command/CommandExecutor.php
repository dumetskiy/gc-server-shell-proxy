<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Worker\Command;

use GamersClub\ServerShellProxy\DataFormatter\Command\CommandDataGenerator;
use GamersClub\ServerShellProxy\DTO\Command\CommandDTO;

class CommandExecutor
{
    /**
     * @param CommandDTO $commandDTO
     *
     * @return string|null
     */
    public function executeCommand(CommandDTO $commandDTO): ?string
    {
        $commandValue = CommandDataGenerator::generateCommandExecutionQuery($commandDTO);
        var_dump($commandValue);die;
        $executionResult = shell_exec($commandValue);

        return $commandDTO->isReturnStdOut() ? $executionResult : null;
    }
}