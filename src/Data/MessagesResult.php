<?php

declare(strict_types=1);

namespace RevoTale\SMSFly\Data;

use DateTime;
use RevoTale\SMSFly\SMSFlyAPI;
use RevoTale\SMSFly\Types\Campaign\StateCode;
use Exception;
use RevoTale\Time\Timestamp;

final class MessagesResult extends Container
{
    public function getStateCode(): StateCode
    {
        return StateCode::fromString((string)($this->getData()->state->attributes()->code ?? ''));
    }

    public function getCampaignId(): int
    {
        return (int)($this->getData()->state->attributes()->campaignID ?? 0);
    }

    public function getStateDesc(): string
    {
        return (string)$this->getData()->state;
    }

    /**
     * @throws Exception
     */
    public function getDate(): Timestamp
    {
        return Timestamp::fromDateTime(
            new DateTime((string)$this->getData()->date,
                SMSFlyAPI::getTimeZone()->toNativeDateTimeZone())
        );
    }

    public function getTo(): MessageTo
    {
        return new MessageTo($this->getData()->to);
    }
}
