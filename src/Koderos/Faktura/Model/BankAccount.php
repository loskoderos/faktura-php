<?php

namespace Koderos\Faktura\Model;

use Koderos\Generic\Model\Model;

class BankAccount extends Model implements BankAccountInterface
{
    protected ?string $iban = null;
    protected ?string $bankSwift = null;
    protected ?string $bankName = null;
    protected Address $bankAddress;
    protected ?String $beneficiaryName = null;
    protected Address $beneficiaryAddress;
    
    public function __construct($collection = null)
    {
        $this->bankAddress = new Address();
        $this->beneficiaryAddress = new Address();
        parent::__construct($collection);
    }
    
    public function setIban(?string $iban): BankAccount
    {
        $this->iban = $iban;
        return $this;
    }
    
    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setBankSwift(?string $bankSwift): BankAccount
    {
        $this->bankSwift = $bankSwift;
        return $this;
    }
    
    public function getBankSwift(): ?string
    {
        return $this->bankSwift;
    }
    
    public function setBankName(?string $bankName): BankAccount
    {
        $this->bankName = $bankName;
        return $this;
    }
    
    public function getBankName(): ?string
    {
        return $this->bankName;
    }
    
    public function setBankAddress(AddressInterface $bankAddress): BankAccount
    {
        $this->bankAddress = $bankAddress;
        return $this;
    }
    
    /**
     * @return AddressInterface
     */
    public function getBankAddress(): AddressInterface
    {
        return $this->bankAddress;
    }
    
    public function setBeneficiaryName(?string $beneficiaryName): BankAccount
    {
        $this->beneficiaryName = $beneficiaryName;
        return $this;
    }
    
    public function getBeneficiaryName(): ?string
    {
        return $this->beneficiaryName;
    }
    
    public function setBeneficiaryAddress(AddressInterface $beneficiaryAddress): BankAccount
    {
        $this->beneficiaryAddress = $beneficiaryAddress;
        return $this;
    }
    
    /**
     * @return AddressInterface
     */
    public function getBeneficiaryAddress(): AddressInterface
    {
        return $this->beneficiaryAddress;
    }
}
