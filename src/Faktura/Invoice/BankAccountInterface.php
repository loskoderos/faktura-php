<?php

namespace Faktura\Invoice;

interface BankAccountInterface
{
    /**
     * Get account IBAN number.
     * @return string
     */
    public function getIban();
    
    /**
     * Get bank SWIFT code.
     * @return string
     */
    public function getBankSwiftCode();
    
    /**
     * Get bank name.
     * @return string
     */
    public function getBankName();
    
    /**
     * Get bank address
     * @return AddressInterface
     */
    public function getBankAddress();
    
    /**
     * Get beneficiary name.
     * @return string
     */
    public function getBeneficiaryName();
    
    /**
     * Get beneficiary address.
     * @return AddressInterface
     */
    public function getBeneficiaryAddress();
}
