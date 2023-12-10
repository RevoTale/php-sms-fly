<?php

declare(strict_types=1);

namespace RevoTale\SMSFly\Exceptions;

use RevoTale\SMSFly\Message;
use RevoTale\SMSFly\Types\Campaign\StateCode;
use Exception;

final class StateIsNotOk extends Exception
{
    protected Message $smsMsg;
    private StateCode $state;
    private string $description;

    public function __construct(Message $message, StateCode $state, string $description)
    {
        $this->smsMsg = $message;
        $this->state = $state;
        $this->description = $description;
        parent::__construct('Message state is not ok');
    }

    public function getMsgState(): StateCode
    {
        return $this->state;
    }

    public function getMsgStateDesc(): string
    {
        return $this->description;
    }

    public function getSMSMessage(): Message
    {
        return $this->smsMsg;
    }
}
