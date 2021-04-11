<?php

namespace Test;

use App\Shoppingcart\Cart;
use PHPUnit\Framework\TestCase;
use App\Connection;

class TestBase extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        echo "Inicio \n";
    }

    public static function tearDownAfterClass(): void
    {
        echo "Fin \n";
    }

  /*  protected function setUp(): void
    {
        #Método setUp() SIN usar anotación
        $this->cart = new Cart();
        $this->conn = new Connection();
        $this->conn->createSchema();
    }

    protected function tearDown(): void
    {
         #Método TearDown SIN usar anotación
        $this->conn->dropTable();
    }*/

        /** @before */
    public function customSetUp(){
        #Método SetUp usando anotación @before 
        $this->cart = new Cart();
        $this->conn = new Connection();
        $this->conn->createSchema();
    }

    /** @after */
    public function customTearDown(){
        #Método TearDown usando anotación @after 
        $this->conn->dropTable();
    }


}