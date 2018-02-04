<?php

namespace Faktura\Invoice;

interface PaymentInterface
{
    /**
     * Get payment method.
     * For example 'transfer', 'cash', etc.
     * @return string
     */
    public function getMethod();
    
    /**
     * Get deduction amount to be substracted from the final payable amount.
     * @return double
     */
    public function getDeductionAmount();
    
    /**
     * Get deduction description.
     * @return string
     */
    public function getDeductionDescription();
    
    /**
     * Get total payable of all items on the invoice.
     * Usually: SUM(item 1 total amount, ..., item N total amount)
     * @return double
     */
    public function getPayableAmount();
    
    /**
     * Payment due to date.
     * @return \DateTime
     */
    public function getDueToDate();
    
    /**
     * Bank account.
     * @return BankAccountInterface
     */
    public function getBankAccount();
    
    /**
     * Get final payable.
     * This is the value of the invoice.
     * Usually: final payable = items payable - deduction amount
     * @return double
     */
    public function computeInvoicePayableAmount();
}
