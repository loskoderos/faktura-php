<?php

namespace Faktura\Invoice;

interface PartyInterface
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
     * Get extra details.
     * @return \Generic\Collection\CollectionInterface
     */
    public function getExtra();
}
