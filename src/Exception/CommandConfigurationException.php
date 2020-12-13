<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\Exception;

class CommandConfigurationException extends \Exception
{
    protected const DEFAULT_MESSAGE = 'Failed to load command configuration. This might be caused by invalid yaml formatting.';
}