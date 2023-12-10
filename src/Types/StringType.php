<?php

declare(strict_types=1);

namespace RevoTale\SMSFly\Types;

use function in_array;

abstract class StringType
{
    private string $value;

    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    abstract public static function fromString(string $value): self;

    public function isOneOf(string ...$statuses): bool
    {
        return in_array($this->value, $statuses);
    }

    public function toString(): string
    {
        return $this->value;
    }
}
