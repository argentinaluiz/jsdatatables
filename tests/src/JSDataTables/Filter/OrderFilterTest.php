<?php

namespace JSDataTables\Filter;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-04-15 at 04:53:05.
 */
class OrderFilterTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var OrderFilter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new OrderFilter;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    public function dataInvalidProvider() {
        return array(
            array('column', array(null, 'teste')),
            array('column', array(null, 'desc_teste')),
        );
    }

    /**
     * @dataProvider dataInvalidProvider
     */
    public function testIfIsInvalid($input, $values) {
        foreach ($values as $value) {
            $this->object->get($input)->setValue($value);
            $this->assertFalse($this->object->get($input)->isValid());
        }
    }

    public function testIfIsValid() {
        $valid1 = [
            'column' => '1',
            'dir' => 'asc'
        ];
        $valid2 = [
            'column' => '2',
            'dir' => 'desc'
        ];
        $this->object->setData($valid1);
        $this->assertTrue($this->object->isValid());
        $this->object->setData($valid2);
        $this->assertTrue($this->object->isValid());
    }

}
