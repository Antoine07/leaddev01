<?php

namespace App;

use Iterator;

class Even implements Iterator
{

    public function __construct(
        private int $max = 100,
        private int $current = 0,
        private int $position =  0
    ) {}

    public function rewind()
    {
        $this->position = 0;
        $this->current = 0;
    }

    public function current()
    {
        // deux ressources => aggregation et tu retournes 
        return $this->current;
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
        $this->current += 2;
    }

    public function valid()
    {
        return $this->position  < $this->max;
    }
}
