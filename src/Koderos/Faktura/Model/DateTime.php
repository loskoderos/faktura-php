<?php

namespace Koderos\Faktura\Model;

use Koderos\Generic\Model\ToArrayInterface;

class DateTime extends \DateTime implements ToArrayInterface
{
    public function toArray(): array
    {
        return [
            'timestamp' => $this->getTimestamp(),
            'timezone' => $this->getTimezone()->getName()
        ];
    }
}
