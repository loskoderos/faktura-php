<?php

namespace Koderos\Faktura;

use Koderos\Faktura\Model\Invoice;
use Koderos\Faktura\Model\InvoiceInterface;
use Koderos\Faktura\Exporter\ExporterInterface;
use Koderos\Faktura\Exporter\WkhtmltopdfExporter;
use Koderos\Faktura\Renderer\PhtmlRenderer;
use Koderos\Faktura\Renderer\RendererInterface;
use Koderos\Faktura\Tranport\TransportInterface;

class Faktura
{
    protected RendererInterface $renderer;
    protected string $template;
    protected ExporterInterface $exporter;
    
    public function __construct()
    {
        $this
            ->setRenderer(new PhtmlRenderer())
            ->setExporter(new WkhtmltopdfExporter())
            ;
    }
    
    /**
     * Create a new invoice.
     */
    public function newInvoice(): Invoice
    {
        return new Invoice();
    }
    
    /**
     * Set invoice renderer.
     */
    public function setRenderer(RendererInterface $renderer): Faktura
    {
        $this->renderer = $renderer;
        return $this;
    }
    
    /**
     * Get invoice renderer.
     */
    public function getRenderer(): RendererInterface
    {
        return $this->renderer;
    }
    
    /**
     * Set template, specifics depend on renderer type.
     * @param mixed $template
     */
    public function setTemplate($template): Faktura
    {
        $this->template = $template;
        return $this;
    }
    
    /**
     * Get template.
     */
    public function getTemplate()
    {
        return $this->template;
    }
    
    /**
     * Set invoice exporter.
     */
    public function setExporter(ExporterInterface $exporter): Faktura
    {
        $this->exporter = $exporter;
        return $this;
    }
    
    /**
     * Get exporter.
     */
    public function getExporter(): ExporterInterface
    {
        return $this->exporter;
    }
    
    /**
     * Render and export invoice, save to the output file.
     */
    public function export(InvoiceInterface $invoice, ?string $filename)
    {
        return $this->getExporter()->export($this->render($invoice), $filename);
    }

    /**
     * Render, used internally.
     */
    protected function render(InvoiceInterface $invoice)
    {
        return $this->getRenderer()->render($invoice, $this->getTemplate());
    }
}
