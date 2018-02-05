# Faktura PHP
Generate pretty PDF invoices in PHP.

## What is this?

Faktura is a simple standalone PHP library to render PDF invoices in PHP.
You can easily integrate it into your own project using standard tools like
composer. Currently, Faktura depends on _xvfb_ and _wkhtmltopdf_ to create PDF
files.

![simple_invoice_pl.pdf](https://github.com/loskoderos/faktura-php/raw/master/examples/simple_invoice_pl.pdf)

## Basic usage
~~~php
use Faktura\Faktura;

$faktura = new Faktura();

$invoice = $faktura->newInvoice();
$invoice->setInvoiceReference('INV/123/2018');

//...

$invoice->newItem()
    ->setDescription('Some item on the invoice')
    ->setUnitNetPrice(123)
    ;

//...

$faktura->setTemplate('path_to_your_invoice_template.phtml');
$faktura->export($invoice, 'invoice.pdf');
~~~

