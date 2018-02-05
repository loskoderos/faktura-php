<?php

namespace Faktura;

use Faktura\Invoice\Invoice;

class Faktura
{
    public function newInvoice()
    {
        return new Invoice();
    }
}
