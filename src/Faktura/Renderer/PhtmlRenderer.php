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
        $invoice = $this->arrayToObject($invoice->toArray());
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return new Transport(['content' => $content]);
    }
    
    protected function arrayToObject($array)
    {
        $object = new \stdClass();
        foreach ($array as $k => $v) {
            if (!empty($k)) {
                $object->{$k} = $this->arrayElementValue($v);
            }
        }
        return $object;
    }
    
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
    
    protected function isAssocArray($array)
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}
