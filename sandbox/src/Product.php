<?php

namespace sandbox;

class Product
{
    protected $productId;

    public function __construct()
    {
        $this->productId = rand();
    }
}