<?php

namespace Faktura\Transport;

interface TransportInterface
{
    /**
     * Get HTML content.
     * @return mixed
     */
    public function getContent();
    
    /**
     * Get assets collection.
     * @return \Generic\Collection\CollectionInterface
     */
    public function getAssets();
}
