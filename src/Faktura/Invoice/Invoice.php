<?php

namespace Faktura\Invoice;

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
     * @var \DateTime
     */
    protected $dateOfIssue;
    
    /**
     * @var string
     */
    protected $placeOfSell;
    
    /**
     * @var \DateTime
     */
    protected $dateOfSell;
    
    /**
     * @var PersonInterface
     */
    protected $purchaser;
    
    /**
     * @var PersonInterface
     */
    protected $vendor;
    
    /**
     * @var CollectionInterface
     */
    protected $items;
    
    /**
     * @var PaymentInterface
     */
    protected $payment;
    
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
        $this->dateOfIssue = new \DateTime();
        $this->dateOfSell = new \DateTime();
        $this->purchaser = new Person();
        $this->vendor = new Person();
        $this->items = new Collection();
        $this->payment = new Payment();
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
    
    public function setPlaseOfIssue($placeOfIssue)
    {
        $this->placeOfIssue = (string) $placeOfIssue;
        return $this;
    }
    
    public function getPlaceOfIssue()
    {
        return $this->placeOfIssue;
    }
    
    public function setDateOfIssue(\DateTime $dateOfIssue)
    {
        $this->dateOfIssue = $dateOfIssue;
        return $this;
    }
    
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
    
    public function setDateOfSell(\DateTime $dateOfSell)
    {
        $this->dateOfSell = $dateOfSell;
        return $this;
    }
    
    public function getDateOfSell()
    {
        return $this->dateOfSell;
    }
    
    public function setPurchaser(PersonInterface $purchaser)
    {
        $this->purchaser = $purchaser;
        return $this;
    }
    
    public function getPurchaser()
    {
        return $this->purchaser;
    }
    
    public function setVendor(PersonInterface $vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }
    
    public function getVendor()
    {
        return $this->vendor;
    }
    
    public function setItems(ColectionInterface $items)
    {
        $this->items = $items;
        return $this;
    }
    
    public function getItems()
    {
        return $this->items;
    }
    
    public function setPayment(PaymentInterface $payment)
    {
        $this->payment = $payment;
        return $this;
    }
    
    public function getPayment()
    {
        return $this->payment;
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
