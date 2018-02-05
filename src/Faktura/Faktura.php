<?php

namespace Faktura;

use Faktura\Entity\Invoice;
use Faktura\Entity\InvoiceInterface;
use Faktura\Exporter\ExporterInterface;
use Faktura\Exporter\WkhtmltopdfExporter;
use Faktura\Renderer\PhtmlRenderer;
use Faktura\Renderer\RendererInterface;

class Faktura
{
    /**
     * @var RendererInterface
     */
    protected $renderer;
    
    /**
     * @var string
     */
    protected $template;
    
    /**
     * @var ExporterInterface
     */
    protected $exporter;
    
    public function __construct()
    {
        $this
            ->setRenderer(new PhtmlRenderer())
            ->setExporter(new WkhtmltopdfExporter())
            ;
    }
    
    /**
     * Create a new invoice.
     * @return Invoice
     */
    public function newInvoice()
    {
        return new Invoice();
    }
    
    /**
     * Set invoice renderer.
     * @param RendererInterface $renderer
     * @return $this
     */
    public function setRenderer(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }
    
    /**
     * Get renderer.
     * @return RendererInterface
     */
    public function getRenderer()
    {
        return $this->renderer;
    }
    
    /**
     * Set template, specifics depend on renderer type.
     * @param mixed $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
    
    /**
     * Get template.
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }
    
    /**
     * Set invoice exporter.
     * @param ExporterInterface $exporter
     * @return $this
     */
    public function setExporter(ExporterInterface $exporter)
    {
        $this->exporter = $exporter;
        return $this;
    }
    
    /**
     * Get exporter.
     * @return ExporterInterface
     */
    public function getExporter()
    {
        return $this->exporter;
    }
    
    /**
     * Render and export invoice, save to the output file.
     * @param InvoiceInterface $invoice
     * @param string $filename
     * @return mixed
     */
    public function export(InvoiceInterface $invoice, $filename)
    {
        return $this->getExporter()->export($this->render($invoice), $filename);
    }

    /**
     * Render, used internally.
     * @param InvoiceInterface $invoice
     * @return \Faktura\Tranport\TransportInterface
     */
    protected function render(InvoiceInterface $invoice)
    {
        return $this->getRenderer()->render($invoice, $this->getTemplate());
    }
}
