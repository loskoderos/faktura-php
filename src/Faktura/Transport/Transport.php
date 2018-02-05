<?php

namespace Faktura\Transport;

use Generic\Collection\Collection;
use Generic\Collection\CollectionInterface;
use Generic\Object\Object;

class Transport extends Object implements TransportInterface
{
    protected $content;
    
    protected $assets;
    
    public function __construct($collection = null)
    {
        $this->assets = new Collection();
        parent::__construct($collection);
    }
    
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setAssets(CollectionInterface $assets)
    {
        $this->assets = $assets;
        return $this;
    }
    
    public function getAssets()
    {
        return $this->assets;
    }
}
