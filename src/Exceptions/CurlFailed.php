<?php

declare(strict_types=1);

namespace RevoTale\SMSFly\Exceptions;

final class CurlFailed extends RequestFailed
{
    public function __construct(string $message, int $code = 0)
    {
        parent::__construct($message, $code);
    }
}
