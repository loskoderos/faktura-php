<?php

namespace Faktura\Renderer;

use Generic\Collection\Collection;
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
        $invoice = $this->arrayToObject($invoice->toArray());
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return new Transport(['content' => $content]);
    }
    
    /**
     * Convert an array to an object.
     * @param array $array
     * @return \stdClass
     */
    protected function arrayToObject(array $array)
    {
        $object = new \stdClass();
        foreach ($array as $k => $v) {
            if (!empty($k)) {
                $object->{$k} = $this->arrayElementValue($v);
            }
        }
        return $object;
    }
    
    /**
     * Convert array element.
     * @param mixed $v
     * @return array|type
     */
    protected function arrayElementValue($v)
    {
        if (is_array($v)) {
            if (!$this->isAssocArray($v)) {
                $array = array();
                foreach ($v as $e) {
                    array_push($array, $this->arrayElementValue($e));
                }
                return $array;
            } else {
                return $this->arrayToObject($v);
            }
        } else {
            return $v;
        }
    }
    
    /**
     * Check if array is an associative one.
     * @param array $array
     * @return boolean
     */
    protected function isAssocArray(array $array)
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}
