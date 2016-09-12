<?php

namespace Collections\Iterator;

use Collections\Pair;

class LazyZipIterator implements \Iterator
{
    /**
     * @var \Iterator
     */
    private $it1;

    /**
     * @var \Iterator
     */
    private $it2;

    public function __construct($it1, $it2)
    {
        $this->it1 = $it1;
        $this->it2 = $it2;
    }

    public function __clone()
    {
        $this->it1 = clone $this->it1;
        $this->it2 = clone $this->it2;
    }

    public function rewind()
    {
        $this->it1->rewind();
        $this->it2->rewind();
    }

    public function valid()
    {
        return ($this->it1->valid() && $this->it2->valid());
    }

    public function next()
    {
        $this->it1->next();
        $this->it2->next();
    }

    public function key()
    {
        return $this->it1->key();
    }

    public function current()
    {
        return new Pair($this->it1->current(), $this->it2->current());
    }
}
