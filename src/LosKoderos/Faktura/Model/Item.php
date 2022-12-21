<?php

namespace LosKoderos\Faktura\Model;

use LosKoderos\Generic\Model\Model;

class Item extends Model implements ItemInterface
{
    protected ?string $index = null;
    protected ?string $description = null;
    protected int $quantity = 0;
    protected ?string $unitName = null;
    protected float $unitNetPrice = 0.0;
    protected float $taxPercentage = 0.0;
    
    public function setIndex(?string $index): Item
    {
        $this->index = $index;
        return $this;
    }
    
    public function getIndex(): ?string
    {
        return $this->index;
    }
    
    public function setDescription(?string $description): Item
    {
        $this->description = $description;
        return $this;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    public function setQuantity(int $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }
    
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    
    public function setUnitName(?string $unitName): Item
    {
        $this->unitName = $unitName;
        return $this;
    }
    
    public function getUnitName(): ?string
    {
        return $this->unitName;
    }
    
    public function setUnitNetPrice(float $unitNetPrice): Item
    {
        $this->unitNetPrice = $unitNetPrice;
        return $this;
    }
    
    public function getUnitNetPrice(): float
    {
        return $this->unitNetPrice;
    }
    
    public function setTaxPercentage(float $taxPercentage): Item
    {
        $this->taxPercentage = $taxPercentage;
        return $this;
    }
    
    public function getTaxPercentage(): float
    {
        return $this->taxPercentage;
    }
    
    public function getTotalNetAmount(): float
    {
        return $this->getUnitNetPrice() * $this->getQuantity();
    }
    
    public function getTotalTaxAmount(): float
    {
        return $this->getTotalNetAmount() * $this->getTaxPercentage();
    }
    
    public function getTotalAmount(): float
    {
        return $this->getTotalNetAmount() + $this->getTotalTaxAmount();
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
