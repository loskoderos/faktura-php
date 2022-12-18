<?php

namespace Koderos\Faktura\Model;

interface BankAccountInterface
{
    /**
     * Get account IBAN number.
     * @return string
     */
    public function getIban(): ?string;
    
    /**
     * Get bank SWIFT code.
     * @return string
     */
    public function getBankSwift(): ?string;
    
    /**
     * Get bank name.
     * @return string
     */
    public function getBankName(): ?string;
    
    /**
     * Get bank address
     * @return AddressInterface
     */
    public function getBankAddress(): AddressInterface;
    
    /**
     * Get beneficiary name.
     * @return string
     */
    public function getBeneficiaryName(): ?string;
    
    /**
     * Get beneficiary address.
     * @return AddressInterface
     */
    public function getBeneficiaryAddress(): AddressInterface;
}
