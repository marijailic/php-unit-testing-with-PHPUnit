<?php

class Queue
{
    public const MAX_ITEMS = 5;
    protected array $items = [];

    public function push($item): void
    {
        if ($this->getCount() == static::MAX_ITEMS) {
            throw new QueueException("Queue is full");
        }

        $this->items[] = $item;
    }

    public function pop()
    {
        return array_shift($this->items);
    }

    public function getCount(): int
    {
        return count($this->items);
    }

    public function clear(): void
    {
        $this->items = [];
    }
}