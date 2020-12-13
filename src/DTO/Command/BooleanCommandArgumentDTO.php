<?php

namespace GamersClub\ServerShellProxy\DTO\Command;

class BooleanCommandArgumentDTO extends AbstractCommandArgumentDTO
{
    /**
     * @return string
     */
    public function getFormattedForShellValue(): string
    {
        return $this->value === true ? '1' : '0';
    }
}