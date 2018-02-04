<?php

namespace Faktura\Invoice;

class Person implements PersonInterface
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
    protected $emailAddress;
    
    /**
     * @var string
     */
    protected $phoneNumber;
    
    /**
     * @var string
     */
    protected $websiteUrl;
    
    /**
     * @var string
     */
    protected $taxReference;
    
    /**
     * @var string
     */
    protected $companyReference;
    
    /**
     * @var string
     */
    protected $extra;
    
    public function __construct()
    {
        $this->address = new Address();
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
    
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = (string) $emailAddress;
        return $this;
    }
    
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }
    
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = (string) $phoneNumber;
        return $this;
    }
    
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = (string) $websiteUrl;
        return $this;
    }
    
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
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
    
    public function setExtra($extra)
    {
        $this->extra = $extra;
        return $this;
    }
    
    public function getExtra()
    {
        return $this->extra;
    }
}
