<?php

namespace Faktura\Renderer;

use Generic\Collection\Collection;
use Generic\Utils\ArrayUtils;
use Faktura\Entity\InvoiceInterface;
use Faktura\Transport\Transport;

class PhtmlRenderer implements RendererInterface
{
    protected $plugins;
    
    public function __construct()
    {
        $this->plugins = new Collection();
    }
    
    public function plugin($name, callable $callable)
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
    
    public function render(InvoiceInterface $invoice, $template)
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
