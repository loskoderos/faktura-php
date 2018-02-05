<?php

namespace Faktura;

use PHPUnit\Framework\TestCase;

class FakturaTest extends TestCase
{
    const TEST_INVOICE_REF = 'FV/123/4567/89';
    const TEST_PURCHASE_ORDER_REF = 'PO/123456';
    const TEST_CURRENCY = 'USD';
    const TEST_PLACE_OF_ISSUE = 'London';
    const TEST_PLACE_OF_SELL = 'New York';
    const TEST_DATE_OF_ISSUE = '2018-02-06';
    const TEST_DATE_OF_SELL = '2018-02-07';
    const TEST_PAYMENT_METHOD = 'transfer';
    const TEST_PAYMENT_DUE_TO_DATE = '2018-02-08';
    const TEST_DEDUCTION_AMOUNT = 123.00;
    const TEST_DEDUCTION_DESCRIPTION = 'Test deduction';
    const TEST_ISSUED_BY = 'Test Issuer';
    const TEST_SIGNED_BY = 'Test Signer';
    
    public function testInvoiceMapping()
    {
        $faktura = new Faktura();
        $invoice = $faktura->newInvoice()
            ->setInvoiceReference(self::TEST_INVOICE_REF)
            ->setPurchaseOrderReference(self::TEST_PURCHASE_ORDER_REF)
            ->setCurrency(self::TEST_CURRENCY)
            ->setPlaceOfIssue(self::TEST_PLACE_OF_ISSUE)
            ->setPlaceOfSell(self::TEST_PLACE_OF_SELL)
            ->setDateOfIssue(self::TEST_DATE_OF_ISSUE)
            ->setDateOfSell(self::TEST_DATE_OF_SELL)
            ->setPaymentMethod(self::TEST_PAYMENT_METHOD)
            ->setPaymentDueToDate(self::TEST_PAYMENT_DUE_TO_DATE)
            ->setDeductionAmount(self::TEST_DEDUCTION_AMOUNT)
            ->setDeductionDescription(self::TEST_DEDUCTION_DESCRIPTION)
            ->setIssuedBy(self::TEST_ISSUED_BY)
            ->setSignedBy(self::TEST_SIGNED_BY)
            ;
        
        var_dump($invoice->toArray());
    }
}
