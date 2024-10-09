<?php

use PHPUnit\Framework\TestCase;
use sandbox\Item;
use sandbox\ItemChild;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new Item;

        $this->assertNotEmpty($item->getDescription());
    }

    public function testIDisAnInteger()
    {
        $item = new ItemChild;

        $this->assertIsInt($item->getID());
    }

    // testiranje private metoda pomocu refleksije klase
    // https://www.php.net/manual/en/class.reflectionclass.php
    // just because it is possible, it doesnt mean that its a good idea
    public function testTokenIsAString()
    {
        $item = new Item;

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new Item;

        $reflector = new ReflectionClass(Item::class);

        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ["prefix"]);

        $this->assertStringStartsWith("prefix", $result);
    }
}