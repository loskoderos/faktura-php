<?php

namespace LosKoderos\Faktura\Renderer;

use LosKoderos\Generic\Collection\Collection;
use LosKoderos\Generic\Utils\ArrayUtils;
use LosKoderos\Faktura\Model\InvoiceInterface;
use LosKoderos\Faktura\Transport\Transport;

class PhtmlRenderer implements RendererInterface
{
    protected Collection $plugins;
    
    public function __construct()
    {
        $this->plugins = new Collection();
    }
    
    public function plugin(string $name, callable $callable): PhtmlRenderer
    {
        if (!is_callable($callable)) {
            throw new RendererException("Plugin must be a callable");
        }
        $this->plugins->set($name, $callable);
        return $this;
    }
    
    public function __call($name, $args)
    {
        if (!$this->plugins->has($name)) {
            throw new RendererException("Missing plugin '{$name}'");
        }
        return call_user_func_array($this->plugins->get($name), $args);
    }
    
    public function render(InvoiceInterface $invoice, $template): Transport
    {
        if (!is_file($template) || !file_exists($template)) {
            throw new RendererException("Can't open template file '{$template}'");
        }
        $invoice = ArrayUtils::arrayToStdClass($invoice->toArray());
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return new Transport(['content' => $content]);
    }
}
