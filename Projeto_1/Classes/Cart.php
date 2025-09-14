<?php

class Cart
{
    private array $items = [];
    private LoggeError $loggeError;
    private float $discount = 0; 

    public function __construct(LoggeError $loggeError)
    {
        $this->loggeError = $loggeError;
    }

    public function addProduct(Product $product, int $quantity): void
    {
        if ($quantity <= 0) {
            $this->loggeError->add("Quantidade inválida para o produto: " . $product->getName());
            return;
        }

        if ($product->getStock() < $quantity) {
            $this->loggeError->add("Estoque insuficiente para o produto: " . $product->getName());
            return;
        }

        if ($product->reduceStock($quantity)) {
            if (isset($this->items[$product->getId()])) {
                $existing = $this->items[$product->getId()];
                $newQuantity = $existing->getQuantity() + $quantity;
                $this->items[$product->getId()] = new CartItem($product, $newQuantity);
            } else {
                $this->items[$product->getId()] = new CartItem($product, $quantity);
            }
        } else {
            $this->loggeError->add("Falha ao adicionar o produto: " . $product->getName());
        }
    }

    public function removeProduct(int $productId): void
    {
        if (!isset($this->items[$productId])) {
            $this->loggeError->add("Produto não encontrado no carrinho. ID: " . $productId);
            return;
        }

        $item = $this->items[$productId];
        $product = $item->getProduct();

        $product->restoreStock($item->getQuantity());

        unset($this->items[$productId]);
    }

    public function applyDiscount(string $code): void
    {
        if ($code === 'DESCONTO10') {
            $this->discount = 0.10;
        } else {
            $this->loggeError->add("Cupom inválido: " . $code);
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getSubtotal();
        }
        return $total * (1 - $this->discount);
    }
}
