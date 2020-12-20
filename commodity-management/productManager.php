<?php
class ProductManager{
    protected $listProducts = [];

    /**
     * @return array
     */
    public function getListProduct()
    {
        return $this->listProducts;
    }

    public function add($product)
    {
        array_push($this->listProducts,$product);
    }

    public function delete($index)
    {
        array_splice($this->listProducts,$index ,1);
    }

    public function update($index,$product)
    {
        $this->listProducts[$index] = $product;
    }

    public function get($index)
    {
        return $this->listProducts[$index];
    }

}
