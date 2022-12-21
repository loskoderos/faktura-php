<?php

namespace LosKoderos\Faktura\Model;

use LosKoderos\Generic\Model\ToArrayInterface;

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
