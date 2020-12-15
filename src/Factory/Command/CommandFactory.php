<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Factory\Command;

use GamersClub\ServerShellProxy\DTO\Command\AbstractCommandArgumentDTO;
use GamersClub\ServerShellProxy\DTO\Command\CommandDTO;
use GamersClub\ServerShellProxy\Exception\CommandExecutableReferenceNotDefinedException;
use GamersClub\ServerShellProxy\Factory\Command\Provider\CommandArgumentFactoryProvider;

class CommandFactory
{

    /**
     * @param string $commandHandle
     * @param array $commandData
     *
     * @return CommandDTO
     */
    public function createCommand(string $commandHandle, array $commandData): CommandDTO
    {
        if (!isset($commandData['executable'])) {
            throw CommandExecutableReferenceNotDefinedException::createFromCommandName($commandHandle);
        }

        $command = new CommandDTO();
        $command->setHandle($commandHandle);
        $command->setReturnStdOut($commandData['return_stdout'] ?? true);
        $command->setExecutable($commandData['executable']);
        $command->setArgumentsReflection($commandData['arguments_reflection'] ?? null);

        foreach ($commandData['arguments'] as $argumentName => $argumentConfiguration) {
            $commandArgument = CommandArgumentFactoryProvider::getFactoryForArgumentType($argumentConfiguration['type'])
                ->createCommandArgument($argumentName, $argumentConfiguration);

            var_dump('x', CommandArgumentFactoryProvider::getFactoryForArgumentType($argumentConfiguration['type']));die;

            if (!$commandArgument instanceof AbstractCommandArgumentDTO) {
                continue;
            }

            $command->addArgument($commandArgument);
        }

        return $command;
    }
}