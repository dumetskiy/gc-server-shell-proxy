<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Factory\Command\Provider;

use GamersClub\ServerShellProxy\Enum\ArgumentType;
use GamersClub\ServerShellProxy\Exception\CommandArgumentTypeFactoryNotFoundException;
use GamersClub\ServerShellProxy\Factory\Command\Argument\BooleanCommandArgumentFactory;
use GamersClub\ServerShellProxy\Factory\Command\Argument\CommandArgumentFactoryInterface;
use GamersClub\ServerShellProxy\Factory\Command\Argument\IntegerCommandArgumentFactory;
use GamersClub\ServerShellProxy\Factory\Command\Argument\StringCommandArgumentFactory;

class CommandArgumentFactoryProvider
{
    private static $argumentTypeFactoryMap = [
        ArgumentType::BOOL => BooleanCommandArgumentFactory::class,
        ArgumentType::STRING => StringCommandArgumentFactory::class,
        ArgumentType::INTEGER => IntegerCommandArgumentFactory::class,
    ];

    /**
     * @param string $argumentType
     *
     * @return CommandArgumentFactoryInterface
     */
    public static function getFactoryForArgumentType(string $argumentType): CommandArgumentFactoryInterface
    {
        if (!isset(static::$argumentTypeFactoryMap[$argumentType])) {
            throw CommandArgumentTypeFactoryNotFoundException::createFromCommandArgumentTypeName($argumentType);
        }
        var_dump($argumentType);die;

        return new static::$argumentTypeFactoryMap[$argumentType];
    }
}