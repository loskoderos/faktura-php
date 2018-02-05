# Faktura PHP
Generate pretty PDF invoices in PHP.

## What is this?

Faktura is a simple standalone PHP library to render PDF invoices in PHP.
You can easily integrate it into your own project using standard tools like
composer. Currently, Faktura depends on _xvfb_ and _wkhtmltopdf_ to create PDF
files.

Sample PDF invoice: https://github.com/loskoderos/faktura-php/blob/master/examples/simple_invoice_pl.pdf
![sample](https://raw.githubusercontent.com/loskoderos/faktura-php/master/examples/screenshot1.png)


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

## Installation
Faktura is still under development, however if you want to try it out you can 
easily install it with Composer:
~~~
composer config minimum-stability dev
composer require loskoderos/faktura-php:dev-master
~~~

Before you use it, you need to take care of a couple od system dependencies.
You'll need to install Xvfb and Wkhtmltopdf, on Ubuntu run:
~~~
sudo apt-get install xvfb wkhtmltopdf
~~~

## Contributing
Contributions are welcome, please submit a pull request.

## License
MIT
