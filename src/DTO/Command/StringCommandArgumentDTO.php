<?php

namespace GamersClub\ServerShellProxy\DTO\Command;

class StringCommandArgumentDTO extends AbstractCommandArgumentDTO
{
    /**
     * @return string
     */
    public function getFormattedForShellValue(): string
    {
        return urldecode($this->getValue());
    }
}