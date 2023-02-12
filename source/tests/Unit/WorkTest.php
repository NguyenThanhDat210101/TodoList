<?php
require_once('./app/models/Model.php');
require_once('./app/models/Work.php');

use PHPUnit\Framework\TestCase;
use App\Models\Work;

class WorkTest extends TestCase
{
    private $work;

    public function setUp(): void
    {
        $this->work = new Work();
    }

    public function testGetAll()
    {
        $result = $this->work->get();
        $this->assertIsArray($result);
    }

    public function testInsert()
    {
        $data = [
            'name' => 'Day la test',
            'status' => 1,
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => date("Y-m-d H:i:s"),
        ];
        $result = $this->work->insert($data);
        $this->assertTrue($result);
    }

    public function testFind()
    {
        $result = $this->work->find(41);
        $this->assertIsArray($result);
    }

    public function testUpdate()
    {
        $data = [
            'name' => 'Day la test da update',
        ];
        $result = $this->work->update(40, $data);
        $this->assertEquals(1, $result);
    }

    public function testDelete()
    {
        $result = $this->work->delete(43);
        $this->assertEquals(1, $result);
    }
}
