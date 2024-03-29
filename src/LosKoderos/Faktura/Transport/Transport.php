<?php

namespace LosKoderos\Faktura\Transport;

use LosKoderos\Generic\Model\Model;

class Transport extends Model implements TransportInterface
{
    protected $content;
    
    public function setContent($content): TransportInterface
    {
        $this->content = $content;
        return $this;
    }
    
    public function getContent()
    {
        return $this->content;
    }
}
