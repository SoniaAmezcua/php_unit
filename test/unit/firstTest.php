<?php
namespace test\unit;

use PHPUnit\Framework\TestCase;
use App\Calculator;

class firstTest extends TestCase
{
    public function testSum(){
        $c = new Calculator();
        $this->assertEquals(5,$c->sum(3,2));
        $this->assertInstanceOf(Calculator::class,$c);

    }

    public function testAserts(){
        self::assertTrue(true);
        $this->assertClassHasAttribute("data",Calculator::class);
        $this->assertContains(1,[1,2,5,2,3]);

    }

    public function testToComplete()
    {
        $this->markTestIncomplete(); #para indicar que el test esta incompleto
    }

    public function testSkipped()
    {
        if(true)
        {
            $this->markTestSkipped("Test que no se ejecuta"); 
        }
        
    }

}