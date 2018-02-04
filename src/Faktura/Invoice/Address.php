<?php

namespace Faktura\Invoice;

use Generic\Object\Object;

class Address extends Object implements AddressInterface
{
    /**
     * @var string
     */
    protected $street;
    
    /**
     * @var string
     */
    protected $streetExt;
    
    /**
     * @var string
     */
    protected $city;
    
    /**
     * @var string
     */
    protected $country;
    
    /**
     * @var string
     */
    protected $postCode;
    
    public function setStreet($street)
    {
        $this->street = (string) $street;
        return $this;
    }
    
    public function getStreet()
    {
        return $this->street;
    }
    
    public function setStreetExt($streetExt)
    {
        $this->streetExt = (string) $streetExt;
        return $this;
    }
    
    public function getStreetExt()
    {
        return $this->streetExt;
    }
    
    public function setCity($city)
    {
        $this->city = (string) $city;
        return $this;
    }
    
    public function getCity()
    {
        return $this->city;
    }
    
    public function setCountry($country)
    {
        $this->country = (string) $country;
        return $this;
    }
    
    public function getCountry()
    {
        return $this->country;
    }
    
    public function setPostCode($postCode)
    {
        $this->postCode = (string) $postCode;
        return $this;
    }
    
    public function getPostCode()
    {
        return $this->postCode;
    }
}
