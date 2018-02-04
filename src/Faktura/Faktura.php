<?php

namespace Faktura;

use Faktura\Compiler\CompilerInterface;
use Faktura\Invoice\InvoiceInterface;
use Faktura\Renderer\RendererInterface;

class Faktura
{
    public static function createInvoice()
    {
        
    }
    
    public function setCompiler(CompilerInterface $compiler)
    {
        
    }
    
    public function setRenderer(RendererInterface $renderer)
    {
        
    }
    
    public function generate(InvoiceInterface $invoice, $filename)
    {
        
    }
}
