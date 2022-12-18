<?php

namespace Koderos\Faktura\Model;

use Koderos\Generic\Collection\Collection;
use Koderos\Generic\Model\Model;

class Party extends Model implements PartyInterface
{
    protected ?string $companyName = null;
    protected ?string $contactName = null;
    protected Address $address;
    protected ?string $taxReference = null;
    protected ?string $companyReference = null;
    protected Collection $extra;
    
    public function __construct($collection = null)
    {
        $this->address = new Address();
        $this->extra = new Collection();
        parent::__construct($collection);
    }
    
    public function setCompanyName(?string $companyName): Party
    {
        $this->companyName = $companyName;
        return $this;
    }
    
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }
    
    public function setContactName(?string $contactName): Party
    {
        $this->contactName = $contactName;
        return $this;
    }
    
    public function getContactName(): ?string
    {
        return $this->contactName;
    }
    
    public function setAddress(AddressInterface $address): Party
    {
        $this->address = $address;
        return $this;
    }
    
    public function getAddress(): Address
    {
        return $this->address;
    }
    
    public function setTaxReference(?string $taxReference): Party
    {
        $this->taxReference = $taxReference;
        return $this;
    }
    
    public function getTaxReference(): ?string
    {
        return $this->taxReference;
    }
    
    public function setCompanyReference(?string $companyReference): Party
    {
        $this->companyReference = $companyReference;
        return $this;
    }
    
    public function getCompanyReference(): ?string
    {
        return $this->companyReference;
    }
    
    public function setExtra(CollectionInterface $extra): Party
    {
        $this->extra = $extra;
        return $this;
    }
    
    public function getExtra(): Collection
    {
        return $this->extra;
    }
}
