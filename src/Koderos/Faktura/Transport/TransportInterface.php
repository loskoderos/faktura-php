<?php

namespace Koderos\Faktura\Transport;

interface TransportInterface
{
    /**
     * Get HTML content.
     * @return mixed
     */
    public function getContent();
}
