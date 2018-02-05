<?php

namespace Faktura\Entity;

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
