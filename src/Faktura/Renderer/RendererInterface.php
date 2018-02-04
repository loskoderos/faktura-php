<?php

namespace Faktura\Renderer;

use Faktura\Transport\TransportInterface;

interface RendererInterface
{
    /**
     * Render an invoice compiled into a transport object.
     * @param TransportInterface $transport
     * @param string $filename
     */
    public function render(TransportInterface $transport, $filename);
}
