<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Factory\Command\Argument;

use GamersClub\DTO\Command\StringCommandArgumentDTO;
use GamersClub\ServerShellProxy\DTO\Command\AbstractCommandArgumentDTO;
use GamersClub\ServerShellProxy\DTO\Command\BooleanCommandArgumentDTO;
use GamersClub\ServerShellProxy\Manager\Request\RequestManager;

abstract class AbstractCommandArgumentFactory implements CommandArgumentFactoryInterface
{
    /**
     * @var RequestManager
     */
    protected $requestManager;

    public function __construct()
    {
        $this->requestManager = new RequestManager();
    }

    /**
     * @param string $commandArgumentKey
     * @param array $commandArgumentConfig
     *
     * @return AbstractCommandArgumentDTO|null
     */
    public function createCommandArgument(string $commandArgumentKey, array $commandArgumentConfig): ?AbstractCommandArgumentDTO
    {
        return $this->getDecoratedCommandArgument($this->getCommandInstance(), $commandArgumentKey, $commandArgumentConfig);
    }

    /**
     * @param AbstractCommandArgumentDTO $argumentDTO
     * @param string $commandArgumentKey
     * @param array $argumentConfig
     *
     * @return AbstractCommandArgumentDTO|null
     */
    protected function getDecoratedCommandArgument(
        AbstractCommandArgumentDTO $argumentDTO,
        string $commandArgumentKey,
        array $argumentConfig
    ): ?AbstractCommandArgumentDTO {
        $argumentValue = $this->requestManager->getQueryParam($commandArgumentKey, $argumentConfig['required']);

        if (!$argumentValue) {
            return null;
        }

        return $argumentDTO
            ->setValue($this->prepareArgumentValue($argumentValue, $commandArgumentKey))
            ->setName($commandArgumentKey);
    }

    /**
     * @return AbstractCommandArgumentDTO
     */
    abstract protected function getCommandInstance(): AbstractCommandArgumentDTO;

    /**
     * @param $argumentValue
     * @param string $argumentName
     *
     * @return mixed
     */
    abstract protected function prepareArgumentValue($argumentValue, string $argumentName);
}