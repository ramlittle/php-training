<?php
    include_once "../header.php";
    include_once "../config/database.php";
    include_once "../classes/customer.php";

    $db = new Database();
    $dbase = $db->getConnection();

    $customer = new Customer($dbase);

    if($_POST){
        $customer->first_name = $_POST['first_name'];
        $customer->last_name = $_POST['last_name'];
        $customer->city = $_POST['city'];

        if($customer->create()){
           echo ' <div class="alert alert-success" role="alert">
                <strong>Successfully added</strong> Some Word
            </div>';    
        }
    }
?>

<p>Create a Customer</p>

<form method="POST" action="create.php">
    <table class="table">
        <tr>
            <td><label class="form-label"> First Name </label></td>
            <td><input type="text" class="form-control" name="first_name"></td>
        </tr>
        <tr>
            <td><label class="form-label"> Last Name </label></td>
            <td><input type="text" class="form-control" name="last_name"></td>
        </tr>
        <tr>
            <td><label class="form-label"> City </label></td>
            <td><input type="text" class="form-control" name="city"></td>
        </tr>
        <tr>
            <td><button type="submit" class="btn btn-primary">Save</button></td>
        </tr>
    </table>
</form>
