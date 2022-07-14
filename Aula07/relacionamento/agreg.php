<?php

class Order
{
    protected array $items = [];

    // PHP 8.0
    // Promoção de propriedade em construtor
    public function __construct(
        public int $id = 0
    ) {
        # code...
    }

    public function addProduct(Product $product)
    {
        $this->items[] = $product;
    }
}

class Product
{

}

$order = new Order(123);

// agregação
// ato de adicionar muitiplos objeto da mesma classe
// no objeto principal Order > 3 * objetos 
$order->addProduct(new Product());
$order->addProduct(new Product());
$order->addProduct(new Product());

var_dump($order);