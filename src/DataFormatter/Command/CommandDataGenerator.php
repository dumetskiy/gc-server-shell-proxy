<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\DataFormatter\Command;

use GamersClub\ServerShellProxy\DTO\Command\CommandDTO;

class CommandDataGenerator
{
    private const COMMAND_TEMPLATE = 'sh %s %s';
    private const EXECUTABLE_PATH_FORMAT = '%s/executable/%s';
    private const COMMAND_ARGUMENT_TEMPLATE = '{%s}';

    /**
     * @param CommandDTO $commandDTO
     *
     * @return string
     */
    public static function generateCommandExecutionQuery(CommandDTO $commandDTO): string
    {
        $commandArgumentsReflectionReplaceMapFrom = [];
        $commandArgumentsReflectionReplaceMapTo = [];

        foreach ($commandDTO->getArguments() as $argumentDTO) {
            $commandArgumentsReflectionReplaceMapFrom[] = sprintf(self::COMMAND_ARGUMENT_TEMPLATE, $argumentDTO->getName());
            $commandArgumentsReflectionReplaceMapTo[] = $argumentDTO->getFormattedForShellValue();
        }

        $formattedCommandArgumentsValue = str_replace(
            $commandArgumentsReflectionReplaceMapFrom,
            $commandArgumentsReflectionReplaceMapTo,
            $commandDTO->getArgumentsReflection()
        );

        $commandExecutablePath = sprintf(self::EXECUTABLE_PATH_FORMAT, $_SERVER['DOCUMENT_ROOT'], $commandDTO->getExecutable());

        return sprintf(self::COMMAND_TEMPLATE, $commandExecutablePath, $formattedCommandArgumentsValue);
    }
}
