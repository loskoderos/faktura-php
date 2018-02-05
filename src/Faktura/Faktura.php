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
    
    public function newInvoice()
    {
        return new Invoice();
    }
    
    public function setRenderer(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }
    
    public function getRenderer()
    {
        return $this->renderer;
    }
    
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
    
    public function getTemplate()
    {
        return $this->template;
    }
    
    public function setExporter(ExporterInterface $exporter)
    {
        $this->exporter = $exporter;
        return $this;
    }
    
    public function getExporter()
    {
        return $this->exporter;
    }
    
    public function export(InvoiceInterface $invoice, $filename)
    {
        return $this->getExporter()->export($this->render($invoice), $filename);
    }
    
    protected function render(InvoiceInterface $invoice)
    {
        return $this->getRenderer()->render($invoice, $this->getTemplate());
    }
}
