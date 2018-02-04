<?php

namespace Faktura\Invoice;

class Item implements ItemInterface
{
    /**
     * @var string
     */
    protected $index;
    
    /**
     * @var string
     */
    protected $description;
    
    /**
     * @var integer
     */
    protected $quantity;
    
    /**
     * @var string
     */
    protected $unitName;
    
    /**
     * @var double
     */
    protected $unitNetPrice;
    
    /**
     * @var double
     */
    protected $unitTax;
    
    public function setIndex($index)
    {
        $this->index = (string) $index;
        return $this;
    }
    
    public function getIndex()
    {
        return $this->index;
    }
    
    public function setDescription($description)
    {
        $this->description = (string) $description;
        return $this;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setQuantity($quantity)
    {
        $this->quantity = (int) $quantity;
        return $this;
    }
    
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function setUnitName($unitName)
    {
        $this->unitName = (string) $unitName;
        return $this;
    }
    
    public function getUnitName()
    {
        return $this->unitName;
    }
    
    public function setUnitNetPrice($unitNetPrice)
    {
        $this->unitNetPrice = (double) $unitNetPrice;
        return $this;
    }
    
    public function getUnitNetPrice()
    {
        return $this->unitNetPrice;
    }
    
    public function setUnitTax($unitTax)
    {
        $this->unitTax = (double) $unitTax;
        return $this;
    }
    
    public function getUnitTax()
    {
        return $this->unitTax;
    }
    
    public function computeTotalNetAmount()
    {
        return $this->getUnitNetPrice() * $this->getQuantity();
    }
    
    public function computeTotalTaxAmount()
    {
        return $this->computeTotalNetAmount() * $this->getUnitTax();
    }
    
    public function computeTotalAmount()
    {
        return $this->computeTotalNetAmount() + $this->computeTotalTaxAmount();
    }
}
