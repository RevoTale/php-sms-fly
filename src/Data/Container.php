<?php

declare(strict_types=1);

namespace RevoTale\SMSFly\Data;

use SimpleXMLElement;

abstract class Container
{
    private SimpleXMLElement $data;

    public function __construct(SimpleXMLElement $response)
    {
        $this->data = $response;
    }

    protected function getData(): SimpleXMLElement
    {
        return $this->data;
    }
}
