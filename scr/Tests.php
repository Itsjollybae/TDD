<?php
namespace Tests;

use PHPUnit\Framework\TestCase; 
use App\UserTableWrapper;

class Test extends TestCase
{
    /**
     * @var UserTableWrapper
     */
    private $userTableWrapper;

    protected function setUp(): void
    {
        $this->userTableWrapper = new UserTableWrapper();
    }

    public function testInsert(): void
    {
        $values = ['name' => 'John Doe', 'email' => 'john.doe@example.com'];
        $this->userTableWrapper->insert($values);
        $this->assertCount(1, $this->userTableWrapper->get());
    }

    public function testUpdate(): void
    {
        $values = ['name' => 'John Doe', 'email' => 'john.doe@example.com'];
        $this->userTableWrapper->insert($values);
        $updatedValues = ['name' => 'Jane Doe', 'email' => 'jane.doe@example.com'];
        $this->userTableWrapper->update(0, $updatedValues);
        $this->assertEquals($updatedValues, $this->userTableWrapper->get()[0]);
    }

    public function testDelete(): void
    {
        $values = ['name' => 'John Doe', 'email' => 'john.doe@example.com'];
        $this->userTableWrapper->insert($values);
        $this->userTableWrapper->delete(0);
        $this->assertEmpty($this->userTableWrapper->get());
    }

    public function testGet(): void
    {
        $values = ['name' => 'John Doe', 'email' => 'john.doe@example.com'];
        $this->userTableWrapper->insert($values);
        $this->assertEquals([$values], $this->userTableWrapper->get());
    }
}