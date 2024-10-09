<?php

namespace sandbox;

// testiranje protected metoda pomocu child klase
class ItemChild extends Item
{
    public function getID()
    {
        return parent::getID();
    }
}