<?php

namespace Faktura\Transport;

interface TransportInterface
{
    /**
     * Get HTML content.
     * @return string
     */
    public function getContent();
}
