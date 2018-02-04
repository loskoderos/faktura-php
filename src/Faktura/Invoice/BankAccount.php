<?php

namespace Faktura\Invoice;

class BankAccount implements BankAccountInterface
{
    /**
     * @var string
     */
    protected $iban;
    
    /**
     * @var string
     */
    protected $bankSwiftCode;
    
    /**
     * @var string
     */
    protected $bankName;
    
    /**
     * @var AddressInterface
     */
    protected $bankAddress;
    
    /**
     * @var string
     */
    protected $beneficiaryName;
    
    /**
     * @var AddressInterface
     */
    protected $beneficiaryAddress;
    
    public function __construct()
    {
        $this->bankAddress = new Address();
        $this->beneficiaryAddress = new Address();
    }
    
    public function setIban($iban)
    {
        $this->iban = (string) $iban;
        return $this;
    }
    
    public function getIban()
    {
        return $this->iban;
    }
    
    public function setBankSwiftCode($swiftCode)
    {
        $this->bankSwiftCode = (string) $swiftCode;
        return $this;
    }
    
    public function setBankName($bankName)
    {
        $this->bankName = (string) $bankName;
        return $this;
    }
    
    public function getBankName()
    {
        return $this->bankName;
    }
    
    public function setBankAddress(AddressInterface $bankAddress)
    {
        $this->bankAddress = $bankAddress;
        return $this;
    }
    
    public function getBankAddress()
    {
        return $this->bankAddress;
    }
    
    public function setBeneficiaryName($beneficiaryName)
    {
        $this->beneficiaryName = (string) $beneficiaryName;
        return $this;
    }
    
    public function getBeneficiaryName()
    {
        return $this->beneficiaryName;
    }
    
    public function setBeneficiaryAddress(AddressInterface $beneficiaryAddress)
    {
        $this->beneficiaryAddress = $beneficiaryAddress;
        return $this;
    }
    
    public function getBeneficiaryAddress()
    {
        return $this->beneficiaryAddress;
    }
}
