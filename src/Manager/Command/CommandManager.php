<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Manager\Command;

use GamersClub\ServerShellProxy\ConfigLoader\Command\CommandLoader;
use GamersClub\ServerShellProxy\Enum\QueryParam;
use GamersClub\ServerShellProxy\Manager\Request\RequestManager;
use GamersClub\ServerShellProxy\Worker\Command\CommandExecutor;

class CommandManager
{
    /**
     * @var RequestManager
     */
    private $requestManager;

    /**
     * @var CommandLoader
     */
    private $commandLoader;

    /**
     * @var CommandExecutor
     */
    private $commandExecutor;

    public function __construct()
    {
        $this->requestManager = new RequestManager();
        $this->commandLoader = new CommandLoader();
        $this->commandExecutor = new CommandExecutor();
    }

    /**
     * @return string|null
     */
    public function manageRequest(): ?string
    {
        $requestedCommand = $this->commandLoader->getCommandByHandle(
            $this->requestManager->getQueryParam(QueryParam::COMMAND)
        );

        return $this->commandExecutor->executeCommand($requestedCommand);
    }
}