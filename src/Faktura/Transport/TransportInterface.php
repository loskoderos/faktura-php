<?php

namespace Faktura\Transport;

interface TransportInterface
{
    /**
     * Get HTML content.
     * @return mixed
     */
    public function getContent();
}
