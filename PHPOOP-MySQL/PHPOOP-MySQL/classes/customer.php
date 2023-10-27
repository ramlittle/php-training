<?php
class Customer{
    private $conn;
    public $first_name;
    public $last_name;
    public $city;
    public $customer_id;

    public function __construct($dbase){
        $this->conn = $dbase;
    }

    public function read(){
        $query = "SELECT * FROM customers";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO customers SET first_name = ?, last_name = ?, city = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->first_name);
        $stmt->bindParam(2, $this->last_name);  
        $stmt->bindParam(3, $this->city);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function edit(){
        $query = "SELECT * FROM customers WHERE customer_id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->customer_id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name']; 
        $this->city = $row['city'];
    }

    public function update(){
        $query = "UPDATE customers SET first_name = ?, last_name = ?, city = ? WHERE customer_id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->first_name);
        $stmt->bindParam(2, $this->last_name);  
        $stmt->bindParam(3, $this->city);
        $stmt->bindParam(4, $this->customer_id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete(){
        $query = "DELETE FROM customers WHERE customer_id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->customer_id);

        $stmt->execute();
    }



   
}
?>