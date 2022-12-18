<?php

namespace Koderos\Faktura\Model;

interface AddressInterface
{
    /**
     * Street line.
     * @return string
     */
    public function getStreet(): ?string;
    
    /**
     * Second street line, in some countries street is broken to two lines.
     * @return string
     */
    public function getStreetExt(): ?string;
    
    /**
     * City.
     * @return string
     */
    public function getCity(): ?string;
    
    /**
     * Country.
     * @return string
     */
    public function getCountry(): ?string;
    
    /**
     * Post code.
     * @return string.
     */
    public function getPostCode(): ?string;
}
