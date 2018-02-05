<?php

namespace Faktura\Entity;

use Generic\Collection\Collection;
use Generic\Collection\CollectionInterface;
use Generic\Object\Object;

class Party extends Object implements PartyInterface
{
    /**
     * @var string
     */
    protected $companyName;
    
    /**
     * @var string
     */
    protected $contactName;
    
    /**
     * @var AddressInterface
     */
    protected $address;
    
    /**
     * @var string
     */
    protected $taxReference;
    
    /**
     * @var string
     */
    protected $companyReference;
    
    /**
     * @var CollectionInterface
     */
    protected $extra;
    
    public function __construct($collection = null)
    {
        $this->address = new Address();
        $this->extra = new Collection();
        parent::__construct($collection);
    }
    
    public function setCompanyName($companyName)
    {
        $this->companyName = (string) $companyName;
        return $this;
    }
    
    public function getCompanyName()
    {
        return $this->companyName;
    }
    
    public function setContactName($contactName)
    {
        $this->contactName = (string) $contactName;
        return $this;
    }
    
    public function getContactName()
    {
        return $this->contactName;
    }
    
    public function setAddress(AddressInterface $address)
    {
        $this->address = $address;
        return $this;
    }
    public function getAddress()
    {
        return $this->address;
    }
    
    public function setTaxReference($taxReference)
    {
        $this->taxReference = (string) $taxReference;
        return $this;
    }
    
    public function getTaxReference()
    {
        return $this->taxReference;
    }
    
    public function setCompanyReference($companyReference)
    {
        $this->companyReference = (string) $companyReference;
        return $this;
    }
    
    public function getCompanyReference()
    {
        return $this->companyReference;
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
}
