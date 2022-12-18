<?php

namespace Koderos\Faktura\Model;

use Koderos\Generic\Collection\Collection;
use Koderos\Generic\Collection\CollectionInterface;
use Koderos\Generic\Model\Model;

class Invoice extends Model implements InvoiceInterface
{
    protected ?string $invoiceReference = null;
    protected ?string $purchaseOrderReference = null;
    protected ?string $currency = null;
    protected ?string $placeOfIssue = null;
    protected ?DateTime $dateOfIssue = null;
    protected ?string $placeOfSell = null;
    protected ?DateTime $dateOfSell = null;
    protected Party $seller;
    protected Party $buyer;
    protected Collection $items;
    protected ?string $paymentMethod = null;
    protected ?DateTime $paymentDueToDate = null;
    protected BankAccount $bankAccount;
    protected float $deductionAmount = 0.0;
    protected ?string $deductionDescription = null;
    protected ?string $issuedBy = null;
    protected ?string $signedBy = null;
    protected Collection $extra;
    
    public function __construct($collection = null)
    {
        $this->seller = new Party();
        $this->buyer = new Party();
        $this->items = new Collection();
        $this->bankAccount = new BankAccount();
        $this->extra = new Collection();
        $dt = new DateTime();
        parent::__construct($collection);
    }
    
    public function setInvoiceReference(?string $invoiceReference): Invoice
    {
        $this->invoiceReference = $invoiceReference;
        return $this;
    }
    
    public function getInvoiceReference(): ?string
    {
        return $this->invoiceReference;
    }
    
    public function setPurchaseOrderReference(?string $purchaseOrderReference): Invoice
    {
        $this->purchaseOrderReference = $purchaseOrderReference;
        return $this;
    }
    
    public function getPurchaseOrderReference(): ?string
    {
        return $this->purchaseOrderReference;
    }
    
    public function setCurrency(?string $currency): Invoice
    {
        $this->currency = $currency;
        return $this;
    }
    
    public function getCurrency(): ?string
    {
        return $this->currency;
    }
    
    public function setPlaceOfIssue(?string $placeOfIssue): Invoice
    {
        $this->placeOfIssue = $placeOfIssue;
        return $this;
    }
    
    public function getPlaceOfIssue(): ?string
    {
        return $this->placeOfIssue;
    }
    
    public function setDateOfIssue($dateOfIssue): Invoice
    {
        if ($dateOfIssue instanceof DateTime) {
            $this->dateOfIssue = $dateOfIssue;
        } else {
            $this->dateOfIssue = new DateTime($dateOfIssue);
        }
        return $this;
    }
    
    public function getDateOfIssue(): ?DateTime
    {
        return $this->dateOfIssue;
    }
    
    public function setPlaceOfSell(?string $placeOfSell): Invoice
    {
        $this->placeOfSell = $placeOfSell;
        return $this;
    }
    
    public function getPlaceOfSell(): ?string
    {
        return $this->placeOfSell;
    }
    
    public function setDateOfSell($dateOfSell): Invoice
    {
        if ($dateOfSell instanceof DateTime) {
            $this->dateOfSell = $dateOfSell;
        } else {
            $this->dateOfSell = new DateTime($dateOfSell);
        }
        return $this;
    }
    
    public function getDateOfSell(): ?DateTime
    {
        return $this->dateOfSell;
    }

    public function setSeller(PartyInterface $seller): Invoice
    {
        $this->seller = $seller;
        return $this;
    }
    
    public function getSeller(): Party
    {
        return $this->seller;
    }
    
    public function setBuyer(PartyInterface $buyer): Invoice
    {
        $this->buyer = $buyer;
        return $this;
    }
    
    public function getBuyer(): Party
    {
        return $this->buyer;
    }
    
    public function setItems(ColectionInterface $items): Invoice
    {
        $this->items = $items;
        return $this;
    }
    
    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }
    
    public function newItem(): Item
    {
        $item = new Item();
        $this->items->add($item);
        return $item;
    }
    
    public function setPaymentMethod(?string $paymentMethod): Invoice
    {
        $this->paymentMethod = (string) $paymentMethod;
        return $this;
    }
    
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }
    
    public function setPaymentDueToDate($paymentDueToDate): Invoice
    {
        if ($paymentDueToDate instanceof DateTime) {
            $this->paymentDueToDate = $paymentDueToDate;
        } else {
            $this->paymentDueToDate = new DateTime($paymentDueToDate);
        }
        return $this;
    }
    
    public function getPaymentDueToDate(): ?DateTime
    {
        return $this->paymentDueToDate;
    }
    
    public function setBankAccount(BankAccountInterface $bankAccount): Invoice
    {
        $this->bankAccount = $bankAccount;
        return $this;
    }
    
    public function getBankAccount(): BankAccount
    {
        return $this->bankAccount;
    }
    
    public function setDeductionAmount(float $deductionAmount): Invoice
    {
        $this->deductionAmount = $deductionAmount;
        return $this;
    }
    
    public function getDeductionAmount(): float
    {
        return $this->deductionAmount;
    }
    
    public function setDeductionDescription(?string $deductionDescription): Invoice
    {
        $this->deductionDescription = $deductionDescription;
        return $this;
    }
    
    public function getDeductionDescription(): ?string
    {
        return $this->deductionDescription;
    }
    
    public function setIssuedBy(?string $issuedBy): Invoice
    {
        $this->issuedBy = $issuedBy;
        return $this;
    }
    
    public function getIssuedBy(): ?string
    {
        return $this->issuedBy;
    }
    
    public function setSignedBy(?string $signedBy): Invoice
    {
        $this->signedBy = $signedBy;
        return $this;
    }
    
    public function getSignedBy(): ?string
    {
        return $this->signedBy;
    }
    
    public function setExtra(CollectionInterface $extra): Invoice
    {
        $this->extra = $extra;
        return $this;
    }
    
    public function getExtra(): Collection
    {
        return $this->extra;
    }
    
    public function getTotalNetAmount(): float
    {
        $amount = 0.0;
        foreach ($this->items as $item) {
            $amount += $item->getTotalNetAmount();
        }
        return $amount;
    }
    
    public function getTotalTaxAmount(): float
    {
        $amount = 0.0;
        foreach ($this->items as $item) {
            $amount += $item->getTotalTaxAmount();
        }
        return $amount;
    }
    
    public function getTotalAmount(): float
    {
        $amount = 0.0;
        foreach ($this->items as $item) {
            $amount += $item->getTotalAmount();
        }
        $amount -= $this->getDeductionAmount();
        return $amount;
    }
    
    public function toArray(): array
    {
        return array_merge(parent::toArray(), array(
            'totalNetAmount' => $this->getTotalNetAmount(),
            'totalTaxAmount' => $this->getTotalTaxAmount(),
            'totalAmount' => $this->getTotalAmount()
        ));
    }
}
