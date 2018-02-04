<?php

namespace Faktura\Invoice;

class Address implements AddressInterface
{
    /**
     * @var string
     */
    protected $contactName;
    
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
    
    /**
     * @var string
     */
    protected $extra;

    public function setContactName($contactName)
    {
        $this->contactName = (string) $contactName;
        return $this;
    }
    
    public function getContactName()
    {
        return $this->contactName;
    }
    
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
    
    public function setExtra($extra)
    {
        $this->extra = (string) $extra;
        return $this;
    }
    
    public function getExtra()
    {
        return $this->extra;
    }
}
