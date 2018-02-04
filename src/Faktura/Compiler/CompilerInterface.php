<?php

namespace Faktura\Compiler;

use Faktura\Invoice\InvoiceInterface;
use Faktura\Transport\TransportInterface;

interface CompilerInterface
{
    /**
     * Compile invoice to transport object.
     * @param InvoiceInterface $invoice
     * @return TransportInterface
     */
    public function compile(InvoiceInterface $invoice);
}
