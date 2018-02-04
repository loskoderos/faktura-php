<?php

namespace Faktura\Invoice;

use Generic\Object\Object;

class Payment extends Object implements PaymentInterface
{
    /**
     * @var string
     */
    protected $method;
    
    /**
     * @var double
     */
    protected $deductionAmount;
    
    /**
     * @var string
     */
    protected $deductionDescription;
    
    /**
     * @var double
     */
    protected $payableAmount;
    
    /**
     * @var \DateTime
     */
    protected $dueToDate;
    
    /**
     * @var BankAccountInterface
     */
    protected $bankAccount;
    
    public function __construct()
    {
        $this->dueToDate = new \DateTime();
        $this->bankAccount = new BankAccount();
    }
    
    public function setMethod($method)
    {
        $this->method = (string) $method;
        return $this;
    }
    
    public function getMethod()
    {
        return $this->method;
    }
    
    public function setDeductionAmount($deductionAmount)
    {
        $this->deductionAmount = (double) $deductionAmount;
        return $this;
    }
    
    public function getDeductionAmount()
    {
        return $this->deductionAmount;
    }
    
    public function setDeductionDescription($deductionDescription)
    {
        $this->deductionDescription = (string) $deductionDescription;
        return $this;
    }
    
    public function getDeductionDescription()
    {
        return $this->deductionDescription;
    }
    
    public function setPayableAmount($payableAmount)
    {
        $this->payableAmount = (double) $payableAmount;
        return $this;
    }
    
    public function getPayableAmount()
    {
        return $this->payableAmount;
    }
    
    public function setDueToDate(\DateTimeInterface $dueToDate)
    {
        $this->dueToDate = $dueToDate;
        return $this;
    }
    
    public function getDueToDate()
    {
        return $this->dueToDate;
    }
    
    public function setBankAccount(BankAccountInterface $bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }
    
    public function getBankAccount()
    {
        return $this->bankAccount;
    }
    
    public function computeInvoicePayableAmount()
    {
        return $this->getPayableAmount() - $this->getDeductionAmount();
    }
}
