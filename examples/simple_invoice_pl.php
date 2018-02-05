<?php

require __DIR__ . '/../vendor/autoload.php';

use Faktura\Faktura;

$faktura = new Faktura();

/**
 * Create a new invoice.
 */
$invoice = $faktura->newInvoice();
$invoice
    ->setInvoiceReference('FV/123/2018/02')
    ->setCurrency('zł')
    ->setDateOfIssue('2018-02-06')
    ->setDateOfSell('2018-02-05')
    ->setPlaceOfIssue('Warszawa')
    ->setPlaceOfSell('Kraków')
    ->setPaymentMethod('Transfer')
    ->setPaymentDueToDate('2018-02-20')
    ->setIssuedBy('Jędrzej Pompka')
    ->setSignedBy('Jan Kowalski')
    ;

/**
 * Fill out selling party information.
 */
$invoice->getSeller()
    ->setCompanyName('JP Consulting Jędrzej Pompka')
    ->setContactName('Zenon Pompka')
    ->setTaxReference('987-654-32-10')
    ;
$invoice->getSeller()->getAddress()
    ->setStreet('Sezamkowa 13')
    ->setCity('Warszawa')
    ->setPostCode('01-234')
    ;
$invoice->getSeller()->getExtra()
    ->set('REGON', '123456789')
    ->set('Phone', '+48 502 123 456')
    ->set('Email', 'kontakt@jpconsulting.tld')
    ->set('WWW', 'www.jpconsulting.tld')
    ;

/**
 * Fill out buying party information.
 */
$invoice->getBuyer()
    ->setCompanyName('Jakaś Sp. z o.o.')
    ->setContactName('Jan Kowalski')
    ->setTaxReference('123-456-78-90')
    ;
$invoice->getBuyer()->getAddress()
    ->setStreet('Kowalskiego 1a/23')
    ->setCity('Kraków')
    ->setPostCode('67-890')
    ;
$invoice->getBuyer()->getExtra()
    ->set('REGON', '987654321')
    ->set('KRS', '0000392700')
    ->set('Phone', '+48 666 321 654')
    ;

/**
 * Fill out bank account section.
 */
$invoice->getBankAccount()
    ->setIban('52 1050 1445 1000 0090 1234 5678')
    ->setBankName('ING Bank Śląski SA')
    ->setBankSwift('INGBPLPW')
    ->setBeneficiaryName('JP Consulting Jędrzej Pompka')
    ->setBeneficiaryAddress($invoice->getSeller()->getAddress())
    ;

/**
 * Add an item.
 */
$invoice->newItem()
    ->setIndex(1)
    ->setDescription('Elektronika do rakiety')
    ->setQuantity(21)
    ->setUnitName('szt.')
    ->setUnitNetPrice(473.00)
    ->setTaxPercentage(0.23)
    ;

/**
 * Add an item.
 */
$invoice->newItem()
    ->setIndex(2)
    ->setDescription('Usługa transportowa')
    ->setQuantity(1)
    ->setUnitNetPrice(100.00)
    ->setTaxPercentage(0.23)
    ;

/**
 * Add a bunch of custom plugins for rendering.
 */

$faktura->getRenderer()->plugin('asset', function ($relativePath) {
    return __DIR__ . '/' . $relativePath;
});

$faktura->getRenderer()->plugin('date', function ($datetime) {
    return date('Y-m-d', $datetime->timestamp);
});

$faktura->getRenderer()->plugin('money', function ($value) {
    return number_format($value, 2, ',', ' ');
});

$faktura->getRenderer()->plugin('percent', function ($value) {
    return round($value * 100.0) . '%';
});

$faktura->getRenderer()->plugin('nospaces', function ($value) {
    return str_replace(' ', '', $value);
});

/**
 * Select template, render and export to PDF.
 */
$faktura->setTemplate(__DIR__ . '/simple_invoice_pl.phtml');
$faktura->export($invoice, __DIR__ . '/simple_invoice_pl.pdf');
