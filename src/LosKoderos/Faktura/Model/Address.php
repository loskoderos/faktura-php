<?php

namespace LosKoderos\Faktura\Model;

use LosKoderos\Generic\Model\Model;

class Address extends Model implements AddressInterface
{
    protected ?string $street = null;
    protected ?string $streetExt = null;
    protected ?string $city = null;
    protected ?string $country = null;
    protected ?string $postCode = null;
    
    public function setStreet(?String $street): Address
    {
        $this->street = $street;
        return $this;
    }
    
    public function getStreet(): ?string
    {
        return $this->street;
    }
    
    public function setStreetExt(?string $streetExt): Address
    {
        $this->streetExt = $streetExt;
        return $this;
    }
    
    public function getStreetExt(): ?string
    {
        return $this->streetExt;
    }
    
    public function setCity(?String $city): Address
    {
        $this->city = $city;
        return $this;
    }
    
    public function getCity(): ?string
    {
        return $this->city;
    }
    
    public function setCountry(?string $country): Address
    {
        $this->country = $country;
        return $this;
    }
    
    public function getCountry(): ?string
    {
        return $this->country;
    }
    
    public function setPostCode(?string $postCode): Address
    {
        $this->postCode = $postCode;
        return $this;
    }
    
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }
}
