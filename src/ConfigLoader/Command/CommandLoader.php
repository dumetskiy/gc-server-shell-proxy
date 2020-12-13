<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\ConfigLoader\Command;

use GamersClub\ServerShellProxy\DTO\Command\CommandDTO;
use GamersClub\ServerShellProxy\Exception\CommandConfigurationException;
use GamersClub\ServerShellProxy\Exception\CommandConfigurationNotFoundException;
use GamersClub\ServerShellProxy\Factory\Command\CommandFactory;

class CommandLoader
{
    /**
     * @param string $commandName
     *
     * @return CommandDTO
     */
    public function getCommandByHandle(string $commandName): CommandDTO
    {
        $commandsConfigData = $this->loadCommandConfigFileData();

        if (!is_array($commandsConfigData)) {
            throw new CommandConfigurationException();
        }

        if (!array_key_exists($commandName, $commandsConfigData)) {
            throw CommandConfigurationNotFoundException::createFromCommandName($commandName);
        }

        return (new CommandFactory())->createCommand($commandName, $commandsConfigData[$commandName]);
    }

    private function loadCommandConfigFileData(): array
    {
       return spyc_load_file($this->generateYamlFilePath('command.yaml'));
    }

    private function generateYamlFilePath(string $fileName): string
    {
        return sprintf('%s/config/%s', $_SERVER['DOCUMENT_ROOT'], $fileName);
    }
}