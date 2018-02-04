<?php

namespace Faktura\Invoice;

interface PersonInterface
{
    /**
     * Get business (company) name.
     * @return string
     */
    public function getCompanyName();
    
    /**
     * Get contact person name.
     * @return string
     */
    public function getContactName();
    
    /**
     * Get address.
     * @return AddressInterface
     */
    public function getAddress();
    
    /**
     * Get email address.
     * @return string
     */
    public function getEmailAddress();
    
    /**
     * Get phone number.
     * @return string
     */
    public function getPhoneNumber();
    
    /**
     * Get website url.
     * @return string
     */
    public function getWebsiteUrl();
    
    /**
     * Get tax reference number.
     * In EU it is VAT ID.
     * @return string
     */
    public function getTaxReference();
    
    /**
     * Get company reference number.
     * In some countries each business has its own company registration number.
     * @return string
     */
    public function getCompanyReference();
    
    /**
     * Get additional information.
     * @return string|array
     */
    public function getExtra();
}
