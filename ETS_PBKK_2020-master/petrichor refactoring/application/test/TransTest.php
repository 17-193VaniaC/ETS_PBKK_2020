<?php 
use PHPUnit\Framework\TestCase;
class TransTest extends TestCase{

    public function testGetAllData()

    {
        $this->load->library('unit_test');
        $this->load->model('Transaction_model');
        $res = $this->Transaction_model->getAll();
        $this->asserEquals(TRUE, is_array($res));
    }

    public function testStub(): void
    {
        $stub = $this->getMockBuilder(Transaction_model::class)
                     ->disableOriginalConstructor()
                     ->disableOriginalClone()
                     ->disableArgumentCloning()
                     ->disallowMockingUnknownTypes()
                     ->getMock();

        $stub->method('save')
             ->willReturn(1);

            $id = 1000;
            $item['id_m'] = 908088;
            $item['qnty'] = 1;
            $item['price'] = 300000;
        $this->assertSame(1, $stub->save($id, $item));
    }
}
?>