<?php

namespace Faktura\Invoice;

use Generic\Object\ToArrayInterface;

class DateTime extends \DateTime implements ToArrayInterface
{
    public function toArray()
    {
        return [
            'timestamp' => $this->getTimestamp(),
            'timezone' => $this->getTimezone()->getName()
        ];
    }
}
