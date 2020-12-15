<?php

namespace GamersClub\ServerShellProxy\DTO\Command;

use GamersClub\ServerShellProxy\DTO\Command\AbstractCommandArgumentDTO;

class StringCommandArgumentDTO extends AbstractCommandArgumentDTO
{
    /**
     * @return string
     */
    public function getFormattedForShellValue(): string
    {
        return sprintf('"%s"', $this->getValue());
    }
}