<?php
class ProductManager {
    private $products = [];

    public function __construct()
    {
    }

    public function getProducts()
    {
        return$this->products;
    }

    public function add($product){
        array_push($this->products,$product);
    }

    public function read($index){
        return $this->products[$index];
    }

    public function update($index,$product)
    {
        return $this->products[$index] = $product;
    }

    public function delete($index)
    {
        array_splice($this->products,$index,1);
    }

}
