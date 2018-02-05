<?php

namespace Faktura\Renderer;

use Faktura\Entity\InvoiceInterface;

interface RendererInterface
{
    /**
     * Render an invoice to a transport object.
     * @param InvoiceInterface $invoice
     * @param string $template
     * @return Faktura\Transport\TransportInterface;
     */
    public function render(InvoiceInterface $invoice, $template);
}
