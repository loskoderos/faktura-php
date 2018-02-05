<?php

require __DIR__ . '/../vendor/autoload.php';

use Faktura\Faktura;

$faktura = new Faktura();

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
    ->setIssuedBy('Łukasz Cepowski')
    ->setSignedBy('Jan Kowalski')
    ;

$invoice->getSeller()
    ->setCompanyName('LCX')
    ->setContactName('Łukasz Cepowski')
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
    ->set('Email', 'contact@domain.tld')
    ->set('WWW', 'www.domain.tld')
    ;

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

$invoice->getBankAccount()
    ->setIban('52 1050 1445 1000 0090 1234 5678')
    ->setBankName('ING Bank Śląski SA')
    ->setBankSwift('INGBPLPW')
    ->setBeneficiaryName('LCX Łukasz Cepowski')
    ->setBeneficiaryAddress($invoice->getSeller()->getAddress())
    ;

$invoice->newItem()
    ->setIndex(1)
    ->setDescription('Elektronika do rakiety')
    ->setQuantity(21)
    ->setUnitName('szt.')
    ->setUnitNetPrice(473.00)
    ->setTaxPercentage(0.23)
    ;

$invoice->newItem()
    ->setIndex(2)
    ->setDescription('Usługa transportowa')
    ->setQuantity(1)
    ->setUnitNetPrice(100.00)
    ->setTaxPercentage(0.23)
    ;

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

$faktura->setTemplate(__DIR__ . '/simple_invoice_pl.phtml');
$faktura->export($invoice, __DIR__ . '/simple_invoice_pl.pdf');
