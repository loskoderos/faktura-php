<?php

namespace Faktura;

use PHPUnit\Framework\TestCase;
use Generic\Utils\ArrayUtils;

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
    
    const TEST_SELLER_COMPANY_NAME = 'Test Seller Company';
    const TEST_SELLER_TAX_REF = 'PL1234567890';
    const TEST_SELLER_COMPANY_REF = 'Reg no 12345';
    const TEST_SELLER_ADDRESS_STREET = 'Selling avenue 123';
    const TEST_SELLER_ADDRESS_STREET_EXT = 'Sell house 1';
    const TEST_SELLER_ADDRESS_CITY = 'Sellers City';
    const TEST_SELLER_ADDRESS_COUNTRY = 'USA';
    const TEST_SELLER_ADDRESS_POST_CODE = 'WA 12345';
    const TEST_SELLER_EXTRA_KEY1 = 'test1';
    const TEST_SELLER_EXTRA_KEY2 = 'test2';
    const TEST_SELLER_EXTRA_KEY3 = 'test3';
    
    const TEST_BUYER_COMPANY_NAME = 'Test Buyer Company';
    const TEST_BUYER_TAX_REF = 'UK987654321';
    const TEST_BUYER_COMPANY_REF = 'Reg no 54321';
    const TEST_BUYER_ADDRESS_STREET = 'Buying ave 123';
    const TEST_BUYER_ADDRESS_STREET_EXT = 'Buy house 1';
    const TEST_BUYER_ADDRESS_CITY = 'Buyers City';
    const TEST_BUYER_ADDRESS_COUNTRY = 'UK';
    const TEST_BUYER_ADDRESS_POST_CODE = 'YO10 1234';
    const TEST_BUYER_EXTRA_KEY1 = 'test4';
    const TEST_BUYER_EXTRA_KEY2 = 'test5';
    const TEST_BUYER_EXTRA_KEY3 = 'test6';
    
    const TEST_BA_IBAN = '12 1234 1234 1234 1234 1234';
    const TEST_BA_BANK_SWIFT = 'ABCDEFGHI';
    const TEST_BA_BANK_NAME = 'Test bank name';
    const TEST_BA_BANK_ADDRESS_STREET = 'Bank street';
    const TEST_BA_BANK_ADDRESS_STREET_EXT = 'Bank street 2';
    const TEST_BA_BANK_ADDRESS_CITY = 'Bank city';
    const TEST_BA_BANK_ADDRESS_COUNTRY = 'Bank country';
    const TEST_BA_BANK_ADDRESS_POST_CODE = 'BA12345';
    const TEST_BA_BENEFICIARY_NAME = 'Beneficiary name';
    const TEST_BA_BENEFICIARY_ADDRESS_STREET = 'Ben street';
    const TEST_BA_BENEFICIARY_ADDRESS_STREET_EXT = 'Ben street 2';
    const TEST_BA_BENEFICIARY_ADDRESS_CITY = 'Ben city';
    const TEST_BA_BENEFICIARY_ADDRESS_COUNTRY = 'Ben country';
    const TEST_BA_BENEFICIARY_ADDRESS_POST_CODE = 'BE12345';
    
    const TEST_EXTRA_KEY1 = 'test1';
    const TEST_EXTRA_KEY2 = 'test2';
    const TEST_EXTRA_KEY3    = 'test3';
    
    const TEST_ITEM_DESCRIPTION = 'Test item %d';
    const TEST_ITEM_UNIT_NAME = 'Test unit name %d';
    
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
        
        $invoice->getSeller()
            ->setCompanyName(self::TEST_SELLER_COMPANY_NAME)
            ->setTaxReference(self::TEST_SELLER_TAX_REF)
            ->setCompanyReference(self::TEST_SELLER_COMPANY_REF)
            ;
        $invoice->getSeller()->getAddress()
            ->setStreet(self::TEST_SELLER_ADDRESS_STREET)
            ->setStreetExt(self::TEST_SELLER_ADDRESS_STREET_EXT)
            ->setCity(self::TEST_SELLER_ADDRESS_CITY)
            ->setCountry(self::TEST_SELLER_ADDRESS_COUNTRY)
            ->setPostCode(self::TEST_SELLER_ADDRESS_POST_CODE)
            ;
        $invoice->getSeller()->getExtra()
            ->set('Key1', self::TEST_SELLER_EXTRA_KEY1)
            ->set('Key2', self::TEST_SELLER_EXTRA_KEY2)
            ->set('Key3', self::TEST_SELLER_EXTRA_KEY3)
            ;
        
        $invoice->getBuyer()
            ->setCompanyName(self::TEST_BUYER_COMPANY_NAME)
            ->setTaxReference(self::TEST_BUYER_TAX_REF)
            ->setCompanyReference(self::TEST_BUYER_COMPANY_REF)
            ;
        $invoice->getBuyer()->getAddress()
            ->setStreet(self::TEST_BUYER_ADDRESS_STREET)
            ->setStreetExt(self::TEST_BUYER_ADDRESS_STREET_EXT)
            ->setCity(self::TEST_BUYER_ADDRESS_CITY)
            ->setCountry(self::TEST_BUYER_ADDRESS_COUNTRY)
            ->setPostCode(self::TEST_BUYER_ADDRESS_POST_CODE)
            ;
        $invoice->getBuyer()->getExtra()
            ->set('Key1', self::TEST_BUYER_EXTRA_KEY1)
            ->set('Key2', self::TEST_BUYER_EXTRA_KEY2)
            ->set('Key3', self::TEST_BUYER_EXTRA_KEY3)
            ;
        
        $invoice->getBankAccount()
            ->setIban(self::TEST_BA_IBAN)
            ->setBankSwift(self::TEST_BA_BANK_SWIFT)
            ->setBankName(self::TEST_BA_BANK_NAME)
            ->setBeneficiaryName(self::TEST_BA_BENEFICIARY_NAME)
            ;
        $invoice->getBankAccount()->getBankAddress()
            ->setStreet(self::TEST_BA_BANK_ADDRESS_STREET)
            ->setStreetExt(self::TEST_BA_BANK_ADDRESS_STREET_EXT)
            ->setCity(self::TEST_BA_BANK_ADDRESS_CITY)
            ->setCountry(self::TEST_BA_BANK_ADDRESS_COUNTRY)
            ->setPostCode(self::TEST_BA_BANK_ADDRESS_POST_CODE)
            ;
        $invoice->getBankAccount()->getBeneficiaryAddress()
            ->setStreet(self::TEST_BA_BENEFICIARY_ADDRESS_STREET)
            ->setStreetExt(self::TEST_BA_BENEFICIARY_ADDRESS_STREET_EXT)
            ->setCity(self::TEST_BA_BENEFICIARY_ADDRESS_CITY)
            ->setCountry(self::TEST_BA_BENEFICIARY_ADDRESS_COUNTRY)
            ->setPostCode(self::TEST_BA_BENEFICIARY_ADDRESS_POST_CODE)
            ;
        
        $invoice->getExtra()
            ->set('Key1', self::TEST_EXTRA_KEY1)
            ->set('Key2', self::TEST_EXTRA_KEY2)
            ->set('Key3', self::TEST_EXTRA_KEY3)
            ;
        
        for ($i = 1; $i <= 3; $i++) {
            $invoice->newItem()
                ->setIndex($i)
                ->setDescription(sprintf(self::TEST_ITEM_DESCRIPTION, $i))
                ->setUnitName(sprintf(self::TEST_ITEM_UNIT_NAME, $i))
                ->setUnitNetPrice($i * 10)
                ->setQuantity($i * 2)
                ->setTaxPercentage(0.1 * $i)
                ;
        }
        
        $o = ArrayUtils::arrayToStdClass($invoice->toArray());
        
        $this->assertEquals(self::TEST_INVOICE_REF, $o->invoiceReference);
        $this->assertEquals(self::TEST_PURCHASE_ORDER_REF, $o->purchaseOrderReference);
        $this->assertEquals(self::TEST_CURRENCY, $o->currency);
        $this->assertEquals(self::TEST_PLACE_OF_ISSUE, $o->placeOfIssue);
        $this->assertEquals(self::TEST_PLACE_OF_SELL, $o->placeOfSell);
        $this->assertEquals(self::TEST_DATE_OF_ISSUE, date('Y-m-d', $o->dateOfIssue->timestamp));
        $this->assertEquals(self::TEST_DATE_OF_SELL, date('Y-m-d', $o->dateOfSell->timestamp));
        $this->assertEquals(self::TEST_PAYMENT_METHOD, $o->paymentMethod);
        $this->assertEquals(self::TEST_PAYMENT_DUE_TO_DATE, date('Y-m-d', $o->paymentDueToDate->timestamp));
        $this->assertEquals(self::TEST_DEDUCTION_AMOUNT, $o->deductionAmount);
        $this->assertEquals(self::TEST_DEDUCTION_DESCRIPTION, $o->deductionDescription);
        $this->assertEquals(self::TEST_ISSUED_BY, $o->issuedBy);
        $this->assertEquals(self::TEST_SIGNED_BY, $o->signedBy);
        
        $this->assertEquals(self::TEST_SELLER_COMPANY_NAME, $o->seller->companyName);
        $this->assertEquals(self::TEST_SELLER_TAX_REF, $o->seller->taxReference);
        $this->assertEquals(self::TEST_SELLER_COMPANY_REF, $o->seller->companyReference);
        $this->assertEquals(self::TEST_SELLER_ADDRESS_STREET, $o->seller->address->street);
        $this->assertEquals(self::TEST_SELLER_ADDRESS_STREET_EXT, $o->seller->address->streetExt);
        $this->assertEquals(self::TEST_SELLER_ADDRESS_CITY, $o->seller->address->city);
        $this->assertEquals(self::TEST_SELLER_ADDRESS_COUNTRY, $o->seller->address->country);
        $this->assertEquals(self::TEST_SELLER_ADDRESS_POST_CODE, $o->seller->address->postCode);
        $this->assertEquals(self::TEST_SELLER_EXTRA_KEY1, $o->seller->extra->Key1);
        $this->assertEquals(self::TEST_SELLER_EXTRA_KEY2, $o->seller->extra->Key2);
        $this->assertEquals(self::TEST_SELLER_EXTRA_KEY3, $o->seller->extra->Key3);
        
        $this->assertEquals(self::TEST_BUYER_COMPANY_NAME, $o->buyer->companyName);
        $this->assertEquals(self::TEST_BUYER_TAX_REF, $o->buyer->taxReference);
        $this->assertEquals(self::TEST_BUYER_COMPANY_REF, $o->buyer->companyReference);
        $this->assertEquals(self::TEST_BUYER_ADDRESS_STREET, $o->buyer->address->street);
        $this->assertEquals(self::TEST_BUYER_ADDRESS_STREET_EXT, $o->buyer->address->streetExt);
        $this->assertEquals(self::TEST_BUYER_ADDRESS_CITY, $o->buyer->address->city);
        $this->assertEquals(self::TEST_BUYER_ADDRESS_COUNTRY, $o->buyer->address->country);
        $this->assertEquals(self::TEST_BUYER_ADDRESS_POST_CODE, $o->buyer->address->postCode);
        $this->assertEquals(self::TEST_BUYER_EXTRA_KEY1, $o->buyer->extra->Key1);
        $this->assertEquals(self::TEST_BUYER_EXTRA_KEY2, $o->buyer->extra->Key2);
        $this->assertEquals(self::TEST_BUYER_EXTRA_KEY3, $o->buyer->extra->Key3);
        
        $this->assertEquals(self::TEST_BA_IBAN, $o->bankAccount->iban);
        $this->assertEquals(self::TEST_BA_BANK_SWIFT, $o->bankAccount->bankSwift);
        $this->assertEquals(self::TEST_BA_BANK_NAME, $o->bankAccount->bankName);
        $this->assertEquals(self::TEST_BA_BANK_ADDRESS_STREET, $o->bankAccount->bankAddress->street);
        $this->assertEquals(self::TEST_BA_BANK_ADDRESS_STREET_EXT, $o->bankAccount->bankAddress->streetExt);
        $this->assertEquals(self::TEST_BA_BANK_ADDRESS_CITY, $o->bankAccount->bankAddress->city);
        $this->assertEquals(self::TEST_BA_BANK_ADDRESS_COUNTRY, $o->bankAccount->bankAddress->country);
        $this->assertEquals(self::TEST_BA_BANK_ADDRESS_POST_CODE, $o->bankAccount->bankAddress->postCode);
        $this->assertEquals(self::TEST_BA_BENEFICIARY_NAME, $o->bankAccount->beneficiaryName);
        $this->assertEquals(self::TEST_BA_BENEFICIARY_ADDRESS_STREET, $o->bankAccount->beneficiaryAddress->street);
        $this->assertEquals(self::TEST_BA_BENEFICIARY_ADDRESS_STREET_EXT, $o->bankAccount->beneficiaryAddress->streetExt);
        $this->assertEquals(self::TEST_BA_BENEFICIARY_ADDRESS_CITY, $o->bankAccount->beneficiaryAddress->city);
        $this->assertEquals(self::TEST_BA_BENEFICIARY_ADDRESS_COUNTRY, $o->bankAccount->beneficiaryAddress->country);
        $this->assertEquals(self::TEST_BA_BENEFICIARY_ADDRESS_POST_CODE, $o->bankAccount->beneficiaryAddress->postCode);
        
        $this->assertEquals(self::TEST_EXTRA_KEY1, $o->extra->Key1);
        $this->assertEquals(self::TEST_EXTRA_KEY2, $o->extra->Key2);
        $this->assertEquals(self::TEST_EXTRA_KEY3, $o->extra->Key3);
        
        $totalNet = 0.0;
        $totalTax = 0.0;
        $total = 0.0;
        
        $this->assertEquals(3, count($o->items));
        for ($i = 1; $i <= 3; $i++) {
            $item = $o->items[$i-1];
            $this->assertEquals($i, $item->index);
            $this->assertEquals(sprintf(self::TEST_ITEM_DESCRIPTION, $i), $item->description);
            $this->assertEquals(sprintf(self::TEST_ITEM_UNIT_NAME, $i), $item->unitName);
            $this->assertEquals($i * 10, $item->unitNetPrice);
            $this->assertEquals($i * 2, $item->quantity);
            $this->assertEquals(0.1 * $i, $item->taxPercentage);
            
            $this->assertEquals($item->unitNetPrice * $item->quantity, $item->totalNetAmount);
            $this->assertEquals($item->totalNetAmount * $item->taxPercentage, $item->totalTaxAmount);
            $this->assertEquals($item->totalNetAmount + $item->totalTaxAmount, $item->totalAmount);
            
            $totalNet += $item->totalNetAmount;
            $totalTax += $item->totalTaxAmount;
            $total += $item->totalAmount;
        }
        
        $this->assertEquals($totalNet, $o->totalNetAmount);
        $this->assertEquals($totalTax, $o->totalTaxAmount);
        $this->assertEquals($total - $o->deductionAmount, $o->totalAmount);
    }
}
