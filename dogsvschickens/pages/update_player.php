<?php
$id = isset($_GET['id']) ? $_GET['id'] : die("error: missing ID");
include_once "../includes/header.php";
include_once "../config/database.php";
include_once "../classes/player.php";

$db = new Database();
$dbase = $db->getConnection();

$player = new Player($dbase);
$player->player_id = $id;
$player->edit();

if ($_POST) {
    $player->first_name = $_POST['first_name'];
    $player->last_name = $_POST['last_name'];
    $player->email = $_POST['email'];

    if ($player->update()) {
        echo "<script type='text/javascript'>
        alert('Update Successful');
        window.location.href='./playerslist.php';
        </script>";
        
        exit;
    } else {
        echo "<script type='text/javascript'>alert('Update Failed, check code');</script>";
    }
}
?>


<p class="fs-1 text-center p-2 bg-warning text-white">Update Player</p>
<div class="d-flex justify-content-end gap-2">
    <a href="./playerslist.php" class="btn btn-danger">Back</a>
</div>
<form method="POST" action="<?php echo "update_player.php?id={$id}"; ?>">
    <table class="table">
        <tr>
            <td><label class="form-label"> First Name </label></td>
            <td><input type="text" class="form-control" name="first_name" value="<?php echo $player->first_name; ?>">
            </td>
        </tr>
        <tr>
            <td><label class="form-label"> Last Name </label></td>
            <td><input type="text" class="form-control" name="last_name" value="<?php echo $player->last_name; ?>">
            </td>
        </tr>
        <tr>
            <td><label class="form-label"> City </label></td>
            <td><input type="text" class="form-control" name="email" value="<?php echo $player->email; ?>"></td>
        </tr>
        <tr>
            <td><button type="submit" class="btn btn-primary">Save</button></td>
        </tr>
    </table>
</form>

<?php
include_once "../includes/footer.php";
?>