<?php

namespace Faktura\Transport;

use Generic\Object\Object;

class Transport extends Object implements TransportInterface
{
    protected $content;
    
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    
    public function getContent()
    {
        return $this->content;
    }
}
