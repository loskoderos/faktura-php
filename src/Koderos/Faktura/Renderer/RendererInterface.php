<?php

namespace Koderos\Faktura\Renderer;

use Koderos\Faktura\Model\InvoiceInterface;
use Koderos\Faktura\Transport\TransportInterface;

interface RendererInterface
{
    /**
     * Render an invoice to a transport object.
     * @param InvoiceInterface $invoice
     * @param string $template
     * @return TransportInterface;
     */
    public function render(InvoiceInterface $invoice, $template): TransportInterface;
}
