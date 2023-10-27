<?php
    include_once "../config/database.php";
    include_once "../classes/customer.php";

    $db = new Database();
    $dbase = $db->getConnection();

    $customer = new Customer($dbase);
    $customer->customer_id = $_POST['customer_id'];
    
    $customer->delete();
?>
