<?php
include_once "../includes/header.php";
include_once "../config/database.php";
include_once "../classes/player.php";

$db = new Database();
$dbase = $db->getConnection();

$player = new Player($dbase);
$statement = $player->read();
$searchResults = array();

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $result = $player->search($searchQuery);

    if ($result) {
        // Fetch all rows and store them in the $searchResults array
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $searchResults[] = $row;
        }
    }
    $statement = $searchResults; //once done, the search result is copied into statement variable
}
?>
<p class="fs-1 text-center p-2 bg-warning text-white">Players List</p>
<div class="d-flex justify-content-end gap-2">
    <a href="../index.php" class="btn btn-danger">Back</a>
    <a href="add_player.php" class="btn btn-success">Add</a>
</div>
<div class="row d-flex justify-content-end">
    <div class="col-4">
        <form method="GET" action="playerslist.php" class="form">
            <input class="p-2" type="text" name="query" placeholder="Search Last Name...">
            <input class="p-2" type="submit" value="Search">
        </form>
    </div>
</div>
<div class="row d-flex justify-content-center p-2">
    <div class="col-4 d-flex justify-content-center align-items-center">
        <img style="width:15rem;height:15rem;" id="happy-dog" src="../images/happydog.png" />
        <span class="fst-italic text-danger">Note: A player can't be deleted if they have data on the leaderboard.
            Delete their data on the leaderboard so player deletion works.</span>
    </div>
    <div class="col-8">
        <table class="table p-2 text-white">
            <thead>
                <tr>
                    <th>PLAYER ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>ACTIONS</td>
                </tr>
            </thead>
            <tbody>
                
                <?php
                foreach ($statement as $row) {
                    echo "<tr>
                        <td>" . $row['player_id'] . "</td>
                        <td>" . $row['first_name'] . "</td>
                        <td>" . $row['last_name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td><a class='btn btn-primary' style='font-size:x-small;' href='update_player.php?id=" . $row['player_id'] . "' role='button'>Update</a>
                        <a delete-id='" . $row['player_id'] . "' class='btn btn-danger delete-object' style='font-size:x-small;'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include_once "../includes/footer.php";
?>

<script>
    $(document).on('click', '.delete-object', function () {
        var id = $(this).attr('delete-id');
        console.log(('this is what yu have choen to delete', id))
        // if want to design confirm box, try look at boot box or sweet alert
        var confirm = window.confirm("Are you sure you want to delete this record?")
        if (confirm) {
            $.post('delete_player.php', {
                player_id: id
            }, function (data) {
                location.reload();
            }).fail(function () {
                alert('unable to delete. please check code');
            })
        }
    })

</script>