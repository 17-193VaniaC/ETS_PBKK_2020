<?php 
use PHPUnit\Framework\TestCase;
class TransTest extends TestCase{

    public function testExpectFooActualFoo()

    {
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testExpectBarActualBaz()
    {
        $this->expectOutputString('bar');
        print 'bar';
    }
}
?>