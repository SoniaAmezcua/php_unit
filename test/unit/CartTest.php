<?php

namespace Test\Unit;

use App\Shoppingcart\CartItem;
use App\Shoppingcart\CartIsEmptyException;
use Test\TestBase;

class CarTest extends TestBase
{    
    /** @test  
     * @testdox Crear un carrito de compras*/
    public function ItCreatesACart()
    {
        $item = createItem("Mouse", 20); //new CartItem("Mouse", 20);        

        $this->assertEquals(0, $this->cart->count());
        $this->cart->add($item);
        $this->assertEquals(1, $this->cart->count());
    }

    /** @test 
     * @testdox Agregar multiples items*/
    public function AddsMultiplesItems()
    {
        $items = [];

        $this->assertEquals(0, $this->cart->count());
        for($i = 1; $i <= 5; $i++){
            array_push($items, new CartItem("Mouse", 20));
        }
        $this->cart->addItems($items);
        $this->assertEquals(count($items), $this->cart->count());
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->cart->isEmpty());
    }

    /** @test */
    public function ItThrowsAnEmptyException()
    {
        $this->expectException(CartIsEmptyException::class);
        $this->cart->getFirstItem();
    }

    /** @test 
     * @testdox Eliminar un Item*/
    public function ItRemoveAnItem()
    {
        $item = new CartItem("Mouse", 20);
        $this->cart->add($item);
        $this->assertEquals(1, $this->cart->count());
        $this->cart->remove($item->id);
        $this->assertTrue($this->cart->isEmpty());
    }

    /** @test 
     * @testdox Prueba de conexión a base de datos*/
    public function ItStoresAnCart()
    {
        #Método para probar conección a base de datos
        $this->conn->insert($this->cart);
        $cart = $this->conn->get($this->cart->id);
        $this->assertEquals($cart->id, $this->cart->id);
    }


}