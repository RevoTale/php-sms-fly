<?php
declare(strict_types=1);

namespace RevoTale\SMSFly;

class Message
{
    private string $text;
    private string $recipient;
    private string $source;
    private string $description = 'dsf';
    private ?int $startTime = null;
    private ?int $endTime = null;
    private int $ratePerMinute = 1;
    private int $hoursLifetime = 4;

    public function __construct(string $source, string $recipient, string $text)
    {
        $this->source = $source;
        $this->text = $text;
        $this->recipient = $recipient;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setDescription(string $text): void
    {
        $this->description = $text;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getRatePerMinute(): int
    {
        return $this->ratePerMinute;
    }

    public function setRatePerMinute(int $count): void
    {
        $this->ratePerMinute = $count;
    }

    public function setStartTime(int $time): void
    {
        $this->startTime = $time;
    }

    public function getStartTimeStr(): string
    {
        $start_time = $this->startTime;
        return $start_time ? SMSFlyAPI::getTimeZone()->fromUnix($start_time)->format('Y-m-d h:i:s') : 'AUTO';
    }

    public function setEndTime(int $time): void
    {
        $this->endTime = $time;
    }

    public function getEndTimeStr(): string
    {
        $end_time = $this->endTime;
        return $end_time ? SMSFlyAPI::getTimeZone()->fromUnix($end_time)->format('Y-m-d h:i:s') : 'AUTO';
    }

    public function getHoursLifetime(): int
    {
        return $this->hoursLifetime;
    }

    public function setHoursLifetime(int $lifetime): void
    {
        $this->hoursLifetime = $lifetime;
    }

    public function getXmlBody(): string
    {
        /** @noinspection ProperNullCoalescingOperatorUsageInspection */
        $xml_str = sprintf(
            '<message start_time="%s" end_time="%s" lifetime="%s" rate="%s" desc="%s" source="%s">',
            $this->startTime ?? 'AUTO',
            $this->endTime ?? 'AUTO',
            $this->hoursLifetime,
            $this->ratePerMinute,
            $this->description,
            $this->source
        );
        $xml_str .= "<body>$this->text</body>";
        $xml_str .= "<recipient>$this->recipient</recipient>";
        $xml_str .= '</message>';
        return $xml_str;
    }
}
