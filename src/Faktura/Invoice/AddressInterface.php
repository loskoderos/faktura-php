<?php

namespace Faktura\Invoice;

interface AddressInterface
{
    /**
     * Contact name, might be a person or an entity.
     * @return string
     */
    public function getContactName();
    
    /**
     * Street line.
     * @return string
     */
    public function getStreet();
    
    /**
     * Second street line, in some countries street is broken to two lines.
     * @return string
     */
    public function getStreetExt();
    
    /**
     * City.
     * @return string
     */
    public function getCity();
    
    /**
     * Country.
     * @return string
     */
    public function getCountry();
    
    /**
     * Post code.
     * @return string.
     */
    public function getPostCode();
    
    /**
     * Additional information if needed.
     * @return string
     */
    public function getExtra();
}
