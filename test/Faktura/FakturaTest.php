<?php

namespace Faktura;

use PHPUnit\Framework\TestCase;

class FakturaTest extends TestCase
{
    public function testFaktura()
    {
        $faktura = new Faktura();
        $invoice = $faktura->newInvoice();
        var_dump($invoice->toArray());
    }
}
