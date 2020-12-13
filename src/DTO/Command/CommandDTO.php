<?php

declare(strict_types=1);

namespace GamersClub\ServerShellProxy\DTO\Command;

class CommandDTO
{
    /**
     * @var string
     */
    private $handle;

    /**
     * @var string
     */
    private $executable;

    /**
     * @var string|null
     */
    private $argumentsReflection;

    /**
     * @var bool
     */
    private $returnStdOut;

    /**
     * @var AbstractCommandArgumentDTO[]
     */
    private $arguments;

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     */
    public function setHandle(string $handle): void
    {
        $this->handle = $handle;
    }

    /**
     * @return bool
     */
    public function isReturnStdOut(): bool
    {
        return $this->returnStdOut;
    }

    /**
     * @param bool $returnStdOut
     */
    public function setReturnStdOut(bool $returnStdOut): void
    {
        $this->returnStdOut = $returnStdOut;
    }

    /**
     * @return AbstractCommandArgumentDTO[]
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @param AbstractCommandArgumentDTO[] $arguments
     */
    public function setArguments(array $arguments): void
    {
        $this->arguments = $arguments;
    }

    public function addArgument(AbstractCommandArgumentDTO $argumentDTO): void
    {
        $this->arguments[] = $argumentDTO;
    }

    /**
     * @return string
     */
    public function getExecutable(): string
    {
        return $this->executable;
    }

    /**
     * @param string $executable
     */
    public function setExecutable(string $executable): void
    {
        $this->executable = $executable;
    }

    /**
     * @return string|null
     */
    public function getArgumentsReflection(): ?string
    {
        return $this->argumentsReflection;
    }

    /**
     * @param string|null $argumentsReflection
     */
    public function setArgumentsReflection(?string $argumentsReflection): void
    {
        $this->argumentsReflection = $argumentsReflection;
    }
}