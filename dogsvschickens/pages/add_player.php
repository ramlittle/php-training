<?php
include_once "../includes/header.php";
include_once "../config/database.php";
include_once "../classes/player.php";

$db = new Database();
$dbase = $db->getConnection();
$player = new Player($dbase);


if ($_POST) {
    $player->first_name = $_POST['first_name'];
    $player->last_name = $_POST['last_name'];
    $player->email = $_POST['email'];

    if ($player->add()) {
        echo "<div class='alert alert-success' role='alert'>Added Success fully</div>";
    } else {
        echo "<div class='alert alert-success' role='alert'>Failed Adding</div>";
    }

}
?>


<p class="fs-1 text-center p-2 bg-warning text-white">Add Player</p>
<div class="d-flex justify-content-end p-2">
<a href="./playerslist.php" class="btn btn-danger">Back</a>
</div>
<form method="POST" action="add_player.php">
    <table class="table">
        <tr>
            <td><label>First Name</label></td>
            <td><input type="text" class="form-control" name="first_name" required /></td>
        </tr>
        <tr>
            <td><label>Last Name</label></td>
            <td><input type="text" class="form-control" name="last_name" required/></td>
        </tr>
        <tr>
            <td><label>Email</label></td>
            <td><input type="text" class="form-control" name="email" required/></td>
        </tr>
        <tr>
            <td colspan="2 d-flex justify-content-end"></td>
        </tr>
    </table>
    <div class="d-flex justify-content-end p-2">

        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>


<?php
include_once "../includes/footer.php";
?>