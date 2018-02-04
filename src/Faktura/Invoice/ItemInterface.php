<?php

namespace Faktura\Invoice;

interface ItemInterface
{
    /**
     * Index on the invoice.
     * @return string|int
     */
    public function getIndex();
    
    /**
     * Description of the item.
     * @return string
     */
    public function getDescription();
    
    /**
     * Number of items.
     * @return int
     */
    public function getQuantity();
    
    /**
     * Name of the item unit.
     * @return string
     */
    public function getUnitName();
    
    /**
     * Nex price of a single unit.
     * @return double
     */
    public function getUnitNetPrice();
    
    /**
     * Tax associated with unit net price.
     * Should be a numeral between [0.00, 1.00]
     * @return double
     */
    public function getUnitTax();
    
    /**
     * Get total net cost of the item.
     * Usually: total net = unit net price * quantity
     * @return double
     */
    public function computeTotalNetAmount();
    
    /**
     * Get total tax over the item.
     * Usually: total tax = total net amount * tax
     * @return double
     */
    public function computeTotalTaxAmount();
    
    /**
     * Gross price of the item.
     * Usually: total amount = total net amount + total tax amount
     * @return double
     */
    public function computeTotalAmount();
}
