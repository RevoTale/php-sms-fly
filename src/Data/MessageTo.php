<?php

declare(strict_types=1);

namespace RevoTale\SMSFly\Data;

use RevoTale\SMSFly\Types\MessageStatus;

final class MessageTo extends Container
{
    public function getRecipient(): string
    {
        return (string)( $this->getData()->attributes()->recipient??'');
    }

    public function getStatus(): MessageStatus
    {
        return MessageStatus::fromString((string) ($this->getData()->attributes()->status??''));
    }
}
