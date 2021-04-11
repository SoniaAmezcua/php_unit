<?php

namespace App;
use App\Shoppingcart\Cart;

class Connection
{
    public $conn;
    private $schema = "CREATE TABLE IF NOT EXISTS carts(id varchar(20), data text)";

    public function __construct()
    {
        $this->conn = $this->connect();
    } 

    
    public function createSchema()
    {
        #Método para crear esquema
        $this->conn->exec($this->schema);
    }

        public function connect()
    {
        #Método para conexión a base de datos
        try{
            $conn = new \PDO("mysql:host=localhost;dbname=unit", "root". "");
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insert(Cart $cart): void
    {
        #Método para insertar registro en base de datos
        $data = base64_encode(\serialize($cart));
        $sql = "INSERT INTO carts(id, data) VALUES('{ $cart->id }','{ $data }')";
        $this->conn->exec($sql);
    }

    public function dropTable()
    {
        #Método para eliminar tabla en base de datos
        $this->conn->exec("DROP TABLE  carts");
    }

    public function get($id)
    {
        #Método para obtener registro en base de datos        
        $sql = "SELECT * FROM carts WHERE carts.id ='{ $id }'";
        $stmt = $this->conn->query($sql);
        return unserialize(\base64_decode($stmt->fetch()['data']));
    }
}