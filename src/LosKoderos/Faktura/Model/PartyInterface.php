<?php

namespace LosKoderos\Faktura\Model;

use LosKoderos\Generic\Collection\CollectionInterface;

interface PartyInterface
{
    /**
     * Get business (company) name.
     * @return string
     */
    public function getCompanyName(): ?string;
    
    /**
     * Get contact person name.
     * @return string
     */
    public function getContactName(): ?string;
    
    /**
     * Get address.
     * @return AddressInterface
     */
    public function getAddress(): AddressInterface;
    
    /**
     * Get tax reference number.
     * In EU it is VAT ID.
     * @return string
     */
    public function getTaxReference(): ?string;
    
    /**
     * Get company reference number.
     * In some countries each business has its own company registration number.
     * @return string
     */
    public function getCompanyReference(): ?string;
    
    /**
     * Get extra details.
     * @return CollectionInterface
     */
    public function getExtra(): CollectionInterface;
}
