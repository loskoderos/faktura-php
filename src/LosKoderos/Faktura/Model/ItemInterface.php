<?php

namespace LosKoderos\Faktura\Model;

interface ItemInterface
{
    /**
     * Index on the invoice.
     * @return string
     */
    public function getIndex(): ?string;
    
    /**
     * Description of the item.
     * @return string
     */
    public function getDescription(): ?string;
    
    /**
     * Number of items.
     * @return int
     */
    public function getQuantity(): int;
    
    /**
     * Name of the item unit.
     * @return string
     */
    public function getUnitName(): ?string;
    
    /**
     * Net price of a single unit.
     * @return float
     */
    public function getUnitNetPrice(): float;
    
    /**
     * Tax associated with unit net price.
     * Should be a numeral between [0.00, 1.00]
     * @return float
     */
    public function getTaxPercentage(): float;
    
    /**
     * Get total net cost of the item.
     * Usually: total net = unit net price * quantity
     * @return float
     */
    public function getTotalNetAmount(): float;
    
    /**
     * Get total tax over the item.
     * Usually: total tax = total net amount * tax
     * @return float
     */
    public function getTotalTaxAmount(): float;
    
    /**
     * Gross price of the item.
     * Usually: total amount = total net amount + total tax amount
     * @return float
     */
    public function getTotalAmount(): float;
}
