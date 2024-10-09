<?php

use PHPUnit\Framework\TestCase;
use sandbox\Product;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product();

        $reflector = new ReflectionClass(Product::class);

        $property = $reflector->getProperty('productId');

        $property->setAccessible(true);
        $value = $property->getValue($product);

        $this->assertIsInt($value);
    }
}