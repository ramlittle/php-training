<?php
    include_once "../header.php";
    include_once "../config/database.php";
    include_once "../classes/customer.php";

    $db = new Database();
    $dbase = $db->getConnection();

    $customer = new Customer($dbase);
    $stmt = $customer->read();

?>

<p> Customer List </p>

<a class="btn btn-primary" href="create.php" role="button">Add Customer</a>

<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                echo"<tr>
                    <td> $first_name </td>
                    <td> $last_name </td>
                    <td> $city </td>
                    <td> <a class='btn btn-primary' href='update.php?id=$customer_id' role='button'>Update</a>
                    <a delete-id='$customer_id' class='btn btn-danger delete-object'>Delete</a></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
    include_once "../footer.php";
?>

<script>
$(document).on('click', '.delete-object', function(){
    var id = $(this).attr('delete-id');
    console.log(id);
    var q = confirm("Are you sure?");

    if (q == true){
         $.post('delete.php', {
            customer_id: id
         }, function(data){
             location.reload();
         }).fail(function() {
             alert('Unable to delete.');
         });
    }
});
</script>



