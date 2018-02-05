<?php

namespace Faktura\Renderer;

use Faktura\Entity\InvoiceInterface;
use Faktura\Transport\Transport;

class PhtmlRenderer implements RendererInterface
{
    public function render(InvoiceInterface $invoice, $template)
    {
        if (!is_file($template) || !file_exists($template)) {
            throw new RendererException("Can't open template file '{$template}'");
        }
        ob_start();
        @include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return new Transport(['content' => $content]);
    }
}
