<?php

namespace Faktura\Entity;

use Generic\Object\ToArrayInterface;

interface InvoiceInterface extends ToArrayInterface
{
    /**
     * Get invoice number.
     * Usually unique sequential identifier for accounting.
     * @return string
     */
    public function getInvoiceReference();
    
    /**
     * Get purchase order reference.
     * Used when the invoice is associated with a purchase order.
     * @return string
     */
    public function getPurchaseOrderReference();
    
    /**
     * Get currency.
     * @return string
     */
    public function getCurrency();
    
    /**
     * Get place of issue.
     * @return string
     */
    public function getPlaceOfIssue();
    
    /**
     * Get date of issue.
     * @return DateTime
     */
    public function getDateOfIssue();
    
    /**
     * get place of sell.
     * @return string
     */
    public function getPlaceOfSell();
    
    /**
     * Get date of sell.
     * @return DateTime
     */
    public function getDateOfSell();
    
    /**
     * Get selling party.
     * @return PersonInterface
     */
    public function getSeller();
    
    /**
     * Get buying party.
     * @return PersonInterface
     */
    public function getBuyer();
    
    /**
     * Get items
     * @return \Generic\Collection\Collection<ItemInterface>
     */
    public function getItems();
    
    /**
     * Get payment method.
     * For example 'transfer', 'cash', etc.
     * @return string
     */
    public function getPaymentMethod();
    
    /**
     * Get payment due to date.
     * @return DateTime
     */
    public function getPaymentDueToDate();
    
    /**
     * Get bank account.
     * @return BankAccountInterface
     */
    public function getBankAccount();
    
    /**
     * Get deduction amount to be subtracted from the final payable amount.
     * @return double
     */
    public function getDeductionAmount();
    
    /**
     * Get deduction description.
     * @return string
     */
    public function getDeductionDescription();

    /**
     * Get issued by.
     * @return string
     */
    public function getIssuedBy();
    
    /**
     * Get signed by.l
     * @return string
     */
    public function getSignedBy();
    
    /**
     * Get extra information.
     * @return \Generic\Collection\Collection
     */
    public function getExtra();
    
    /**
     * Get total net amount of all items.
     * Usually: total net amount = SUM(item 1 net amount, ..., item N net amount)
     * @return double
     */
    public function getTotalNetAmount();
    
    /**
     * Get total amount of tax.
     * Usually: total tax amount = SUM(item 1 tax amount, ..., item N tax amount)
     * @return double
     */
    public function getTotalTaxAmount();
    
    /**
     * Get gross amount.
     * Usually: total amount = SUM(item 1 total amount, ...., item N total amount) - deduction amount
     */
    public function getTotalAmount();
}
