<?php
declare(strict_types=1);


namespace RevoTale\SMSFly\Types\Campaign;


use RevoTale\SMSFly\Types\StringType;

final class StateCode extends StringType
{
    public const ACCEPT = 'ACCEPT';
    public const XML_ERROR = 'XMLERROR';
    public const ERR_PHONES = 'ERRPHONES';
    public const ERR_START_TIME = 'ERRSTARTTIME';
    public const ERR_END_TIME = 'ERRENDTIME';
    public const ERR_LIFETIME = 'ERRLIFETIME';
    public const ERR_SPEED = 'ERRSPEED';
    public const ERR_ALFA_NAME = 'ERRALFANAME';
    public const ERR_TEXT = 'ERRTEXT';
    public const INSUFFICIENT_FUNDS = 'INSUFFICIENTFUNDS';

    public static function fromString(string $value): self
    {
        return new self($value);
    }
}
