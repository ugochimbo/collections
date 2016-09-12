<?php

namespace Tests\Collections;

use Collections\Queue;
use RuntimeException;

/**
 * @author italo
 */
class QueueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Queue
     */
    private $coll;

    protected function setUp()
    {
        $this->coll = new Queue();
    }

    public function testNewInstance()
    {
        $this->assertNotNull($this->coll);
    }

    public function testEnqueueItem()
    {
        $this->coll->enqueue('testing');
        $this->assertTrue(is_string((string)$this->coll));
    }

    public function testEnqueueMultiple()
    {
        $this->coll->enqueueMultiple(array(1, 2, 3, 4));
        $this->assertTrue(is_string((string)$this->coll));
    }

    /**
     * @expectedException RuntimeException
     */
    public function testDequeueEmptyQueue()
    {
        $this->coll->dequeue();
    }

    public function testEnqueueToArray()
    {
        $this->coll->enqueue('testing1');
        $this->coll->enqueue('testing2');
        $this->coll->enqueue('testing3');

        $this->assertEquals(array('testing1', 'testing2', 'testing3'), $this->coll->toArray());
    }

    public function testEnqueueAndDequeueToArray()
    {
        $this->coll->enqueue('testing1');
        $this->coll->enqueue('testing2');
        $this->coll->enqueue('testing3');

        $this->coll->dequeue();

        $this->assertEquals(array('testing2', 'testing3'), $this->coll->toArray());
    }
}