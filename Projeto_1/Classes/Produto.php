<?php

class Produto 
{
    private int $id;
    private string $name;
    private float $price;
    private int $stock;


    $produtos = [ 
    ['id' => 1, 'name' => 'Camiseta', 'price' => 59.90, 'stock' => 10], 
    ['id' => 2, 'name' => 'Calça Jeans', 'price' => 129.90, 'stock' => 5], 
    ['id' => 3, 'name' => 'Tênis', 'price' => 199.90, 'stock' => 3]
    ]; 

    public function getId() void
    {
        return $this->id;
    }

    public function setId() bool
    {
        if (id <= 0)
            return 
    }
}