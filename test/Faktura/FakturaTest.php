<?php

namespace Faktura;

use PHPUnit\Framework\TestCase;

class FakturaTest extends TestCase
{
    public function testFaktura()
    {
        $invoice = Faktura::createInvoice();
    }
}
