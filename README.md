# Faktura PHP
Generate pretty PDF invoices in PHP.

## What is this?

Faktura is a simple standalone PHP library for rendering PDF invoices in PHP.
You can easily integrate it into your own project using standard tools like
composer. Currently, Faktura depends on _xvfb_ and _wkhtmltopdf_ to create PDF
files. Faktura has builtin rendering based on native PHP templates that can be
customized with plugin functions.

Sample PDF invoice: https://github.com/loskoderos/faktura-php/blob/master/examples/simple_invoice_pl.pdf
![sample](https://raw.githubusercontent.com/loskoderos/faktura-php/master/examples/screenshot1.png)


## Basic usage
Faktura is simple to use and it lets you to map an invoice structure and customize it to your needs.
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
Have a look into _examples_ folder to see the full example:
https://github.com/loskoderos/faktura-php/blob/master/examples/simple_invoice_pl.php

## Features
* Standalone library, no external PHP frameworks needed.
* Easily integrates with others.
* Builtin templating using native PHP templates.
* Builtin support for UTF-8 and images.
* Extend template rendering with custom plugin functions.
* Invoice structure can be customized, you can add custom fields to fit your needs.
* Invoice can be serialized to save it in database for accounting purposes.
* You can easily customize the library with overrides.

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

To confirm, all is good, run the example:
~~~
php examples/simple_invoice_pl.php
~~~
It should finish without any error and generate _examples/simple_invoice_pl.pdf_.

## Contributing
Contributions are welcome, please submit a pull request.

## License
MIT
