<?php

namespace Faktura\Entity;

use Generic\Collection\Collection;
use Generic\Collection\CollectionInterface;
use Generic\Object\Object;

class Invoice extends Object implements InvoiceInterface
{
    /**
     * @var string
     */
    protected $invoiceReference;
    
    /**
     * @var string
     */
    protected $purchaseOrderReference;
    
    /**
     * @var string
     */
    protected $placeOfIssue;

    /**
     * @var DateTime
     */
    protected $dateOfIssue;
    
    /**
     * @var string
     */
    protected $placeOfSell;
    
    /**
     * @var DateTime
     */
    protected $dateOfSell;
    
    /**
     * @var PartyInterface
     */
    protected $seller;
    
    /**
     * @var PartyInterface
     */
    protected $buyer;
    
    /**
     * @var CollectionInterface
     */
    protected $items;
    
    /**
     * @var string
     */
    protected $paymentMethod;
    
    /**
     * @var DateTime
     */
    protected $paymentDueToDate;
    
    /**
     * @var BankAccountInterface
     */
    protected $bankAccount;
    
    /**
     * @var double
     */
    protected $deductionAmount;
    
    /**
     * @var string
     */
    protected $deductionDescription;
    
    /**
     * @var string
     */
    protected $issuedBy;
    
    /**
     * @var string
     */
    protected $signedBy;
    
    /**
     * @var CollectionInterface
     */
    protected $extra;
    
    public function __construct($collection = null)
    {
        $this->seller = new Party();
        $this->buyer = new Party();
        $this->items = new Collection();
        $this->bankAccount = new BankAccount();
        $this->extra = new Collection();
        parent::__construct($collection);
    }
    
    public function setInvoiceReference($invoiceReference)
    {
        $this->invoiceReference = (string) $invoiceReference;
        return $this;
    }
    
    public function getInvoiceReference() 
    {
        return $this->invoiceReference;
    }
    
    public function setPurchaseOrderReference($purchaseOrderReference)
    {
        $this->purchaseOrderReference = (string) $purchaseOrderReference;
        return $this;
    }
    
    public function getPurchaseOrderReference()
    {
        return $this->purchaseOrderReference;
    }
    
    public function setPlaceOfIssue($placeOfIssue)
    {
        $this->placeOfIssue = (string) $placeOfIssue;
        return $this;
    }
    
    public function getPlaceOfIssue()
    {
        return $this->placeOfIssue;
    }
    
    public function setDateOfIssue($dateOfIssue)
    {
        if ($dateOfIssue instanceof DateTime) {
            $this->dateOfIssue = $dateOfIssue;
        } else {
            $this->dateOfIssue = new DateTime((string) $dateOfIssue);
        }
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getDateOfIssue()
    {
        return $this->dateOfIssue;
    }
    
    public function setPlaceOfSell($placeOfSell)
    {
        $this->placeOfSell = (string) $placeOfSell;
        return $this;
    }
    
    public function getPlaceOfSell()
    {
        return $this->placeOfSell;
    }
    
    public function setDateOfSell($dateOfSell)
    {
        if ($dateOfSell instanceof DateTime) {
            $this->dateOfSell = $dateOfSell;
        } else {
            $this->dateOfSell = new DateTime((string) $dateOfSell);
        }
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getDateOfSell()
    {
        return $this->dateOfSell;
    }

    public function setSeller(PartyInterface $seller)
    {
        $this->seller = $seller;
        return $this;
    }
    
    /**
     * @return Party
     */
    public function getSeller()
    {
        return $this->seller;
    }
    
    public function setBuyer(PartyInterface $buyer)
    {
        $this->buyer = $buyer;
        return $this;
    }
    
    /**
     * @return Party
     */
    public function getBuyer()
    {
        return $this->buyer;
    }
    
    public function setItems(ColectionInterface $items)
    {
        $this->items = $items;
        return $this;
    }
    
    /**
     * @return Collection
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * @return Item
     */
    public function newItem()
    {
        $item = new Item();
        $this->items->add($item);
        return $item;
    }
    
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = (string) $paymentMethod;
        return $this;
    }
    
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }
    
    public function setPaymentDueToDate($paymentDueToDate)
    {
        if ($paymentDueToDate instanceof DateTime) {
            $this->paymentDueToDate = $paymentDueToDate;
        } else {
            $this->paymentDueToDate = new DateTime($paymentDueToDate);
        }
        return $this;
    }
    
    /**
     * @return DateTime
     */
    public function getPaymentDueToDate()
    {
        return $this->paymentDueToDate;
    }
    
    public function setBankAccount(BankAccountInterface $bankAccount)
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }
    
    /**
     * @return BankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
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
    
    public function setIssuedBy($issuedBy)
    {
        $this->issuedBy = (string) $issuedBy;
        return $this;
    }
    
    public function getIssuedBy()
    {
        return $this->issuedBy;
    }
    
    public function setSignedBy($signedBy)
    {
        $this->signedBy = (string) $signedBy;
        return $this;
    }
    
    public function getSignedBy()
    {
        return $this->signedBy;
    }
    
    public function setExtra(CollectionInterface $extra)
    {
        $this->extra = $extra;
        return $this;
    }
    
    /**
     * @return Collection
     */
    public function getExtra()
    {
        return $this->extra;
    }
    
    public function computeTotalNetAmount()
    {
        
    }
    
    public function computeTotalTaxAmount()
    {
        
    }
    
    public function computeTotalAmount()
    {
        
    }
}
