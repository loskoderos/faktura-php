<?php

namespace Faktura\Entity;

use Generic\Object\Object;

class BankAccount extends Object implements BankAccountInterface
{
    /**
     * @var string
     */
    protected $iban;
    
    /**
     * @var string
     */
    protected $bankSwift;
    
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
    
    public function __construct($collection = null)
    {
        $this->bankAddress = new Address();
        $this->beneficiaryAddress = new Address();
        parent::__construct($collection);
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

    public function setBankSwift($bankSwift)
    {
        $this->bankSwift = (string) $bankSwift;
        return $this;
    }
    
    public function getBankSwift()
    {
        return $this->bankSwift;
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
    
    /**
     * @return BankAccount
     */
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
    
    /**
     * @return BankAccount
     */
    public function getBeneficiaryAddress()
    {
        return $this->beneficiaryAddress;
    }
}
