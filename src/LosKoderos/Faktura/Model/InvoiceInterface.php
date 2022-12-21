<?php

namespace LosKoderos\Faktura\Model;

use LosKoderos\Generic\Collection\CollectionInterface;

interface InvoiceInterface
{
    /**
     * Get invoice number.
     * Usually unique sequential identifier for accounting.
     * @return string
     */
    public function getInvoiceReference(): ?string;
    
    /**
     * Get purchase order reference.
     * Used when the invoice is associated with a purchase order.
     * @return string
     */
    public function getPurchaseOrderReference(): ?string;
    
    /**
     * Get currency.
     * @return string
     */
    public function getCurrency(): ?string;
    
    /**
     * Get place of issue.
     * @return string
     */
    public function getPlaceOfIssue(): ?string;
    
    /**
     * Get date of issue.
     * @return DateTime
     */
    public function getDateOfIssue(): ?DateTime;
    
    /**
     * get place of sell.
     * @return string
     */
    public function getPlaceOfSell(): ?string;
    
    /**
     * Get date of sell.
     * @return DateTime
     */
    public function getDateOfSell(): ?DateTime;
    
    /**
     * Get selling party.
     * @return PartyInterface
     */
    public function getSeller(): PartyInterface;
    
    /**
     * Get buying party.
     * @return PartyInterface
     */
    public function getBuyer(): PartyInterface;
    
    /**
     * Get items
     * @return CollectionInterface
     */
    public function getItems(): CollectionInterface;
    
    /**
     * Get payment method.
     * For example 'transfer', 'cash', etc.
     * @return string
     */
    public function getPaymentMethod(): ?string;
    
    /**
     * Get payment due to date.
     * @return DateTime
     */
    public function getPaymentDueToDate(): ?DateTime;
    
    /**
     * Get bank account.
     * @return BankAccountInterface
     */
    public function getBankAccount(): BankAccountInterface;
    
    /**
     * Get deduction amount to be subtracted from the final payable amount.
     * @return float
     */
    public function getDeductionAmount(): float;
    
    /**
     * Get deduction description.
     * @return string
     */
    public function getDeductionDescription(): ?string;

    /**
     * Get issued by.
     * @return string
     */
    public function getIssuedBy(): ?String;
    
    /**
     * Get signed by.l
     * @return string
     */
    public function getSignedBy(): ?string;
    
    /**
     * Get extra information.
     * @return CollectionInterface
     */
    public function getExtra(): CollectionInterface;
    
    /**
     * Get total net amount of all items.
     * Usually: total net amount = SUM(item 1 net amount, ..., item N net amount)
     * @return float
     */
    public function getTotalNetAmount(): float;
    
    /**
     * Get total amount of tax.
     * Usually: total tax amount = SUM(item 1 tax amount, ..., item N tax amount)
     * @return float
     */
    public function getTotalTaxAmount(): float;
    
    /**
     * Get gross amount.
     * Usually: total amount = SUM(item 1 total amount, ...., item N total amount) - deduction amount
     */
    public function getTotalAmount(): float;
}
