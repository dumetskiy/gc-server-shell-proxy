<?php

namespace GamersClub\ServerShellProxy\DTO\Command;

class IntegerCommandArgumentDTO extends AbstractCommandArgumentDTO
{
    /**
     * @return string
     */
    public function getFormattedForShellValue(): string
    {
        return (string) $this->value;
    }
}