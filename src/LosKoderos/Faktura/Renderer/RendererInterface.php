<?php

namespace LosKoderos\Faktura\Renderer;

use LosKoderos\Faktura\Model\InvoiceInterface;
use LosKoderos\Faktura\Transport\TransportInterface;

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
