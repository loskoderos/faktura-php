<?php

namespace Faktura\Invoice;

interface InvoiceInterface
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
     * Get place of issue.
     * @return string
     */
    public function getPlaceOfIssue();
    
    /**
     * Get date of issue.
     * @return \DateTime
     */
    public function getDateOfIssue();
    
    /**
     * Get date of sell.
     * @return \DateTime
     */
    public function getDateOfSell();
    
    /**
     * Get purchaser.
     * @return PersonInterface
     */
    public function getPurchaser();
    
    /**
     * Get vendor.
     * @return PersonInterface
     */
    public function getVendor();
    
    /**
     * Get items
     * @return Array<ItemInterface>
     */
    public function getItems();
    
    /**
     * Get payment.
     * @return PaymentInterface
     */
    public function getPayment();
    
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
     * return string|array
     */
    public function getExtra();
    
    /**
     * Get total net amount of all items.
     * Usually: total net amount = SUM(item 1 net amount, ..., item N net amount)
     * @return double
     */
    public function computeTotalNetAmount();
    
    /**
     * Get total amount of tax.
     * Usually: total tax amount = SUM(item 1 tax amount, ..., item N tax amount)
     * @return double
     */
    public function computeTotalTaxAmount();
    
    /**
     * Get gross amount.
     * Usually: total amount = SUM(item 1 total amount, ...., item N total amount)
     */
    public function computeTotalAmount();
}
