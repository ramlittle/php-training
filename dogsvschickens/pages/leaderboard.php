<?php
include_once "../includes/header.php";
include_once "../config/database.php";
include_once "../classes/gameresult.php";

$db = new Database();
$dbase = $db->getConnection();

$gameresult = new GameResult($dbase);
$statement = $gameresult->read();

// get losers
$losersPercentage=$gameresult->getLosersPercentage();
$loserRecord = $losersPercentage->fetch(PDO::FETCH_ASSOC);
$losers;
if ($loserRecord) { 
    $losers= $loserRecord['Losers Percentage'] . "%";
} else {
    $losers=0;
}

// get winners
$winnersPercentage=$gameresult->getWinnersPercentage();
$winnerRecord = $winnersPercentage->fetch(PDO::FETCH_ASSOC);
$winners;
if ($winnerRecord) { 
    $winners= $winnerRecord['Winners Percentage'] . "%";
} else {
    $winners=0;
}

$searchResults = array();

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $result = $gameresult->search($searchQuery);

    if ($result) {
        // Fetch all rows and store them in the $searchResults array
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $searchResults[] = $row;
        }
    }
    $statement = $searchResults;
}

?>
<p class="fs-1 text-center p-2 bg-warning text-white">Leaderboard</p>
<div class="d-flex justify-content-end gap-2">
    <a href="/dogsvschickens/index.php" class="btn btn-danger">Back</a>
</div>
<div class="row d-flex justify-content-end">
    <div class="col-4">
        <form method="GET" action="leaderboard.php" class="form">
            <input class="p-2" type="text" name="query" placeholder="Search Last Name...">
            <input class="p-2" type="submit" value="Search">
        </form>
    </div>
</div>

<div class="row p-2">
    <div class="col-8">

        <table class="table p-2 text-white">
            <thead>
                <tr>
                    <th>Score</th>
                    <th>Bullets Left</th>
                    <th>Chickens Left</th>
                    <th>Status</td>
                    <th>First Name</td>
                    <th>Last Name</td>
                    <th>Email</td>
                    <th>Date Played</td>
                    <th>Team Name</th>
                    <th>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($statement as $row) {
                    $status = $row['status'];
                    $statusColor = ($status === 'Won') ? 'green' : (($status === 'Lost') ? 'red' : 'black');
                    echo "<tr>
                    <td>" . $row['score'] . "</td>
                    <td>" . $row['bullets_left'] . "</td>
                    <td>" . $row['chickens_left'] . "</td>
                    <td style='color: $statusColor;'>" . $status . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['date_played'] . "</td>
                    <td>" . $row['team_name'] . "</td>
                    <td>
                    <a delete-id='" . $row['gameresult_id'] . "' class='btn btn-danger delete-object' style='font-size:x-small;'>Delete</a>
                    </td>
                </tr>";
                }
                ?>
            </tbody>

        </table>
    </div>

    <div class="col-4 d-flex flex-column justify-content-center align-items-center">
        <div>
            <h3>Ratio of Winners and Losers</h3>
            <label>Losers <?php echo $losers;?></label>
            <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100">
                <div class="progress-bar bg-danger" style=<?php echo 'width:'. $losers;?>></div>
            </div>
            <label>Winners <?php echo $winners;?></label>
            <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0"
                aria-valuemax="100">
                <div class="progress-bar bg-success" style=<?php echo 'width:'. $winners;?>></div>
            </div>
        </div>
        <img src="../images/chickenpartying.gif" />
        <span class="fst-italic text-danger">Want to be listed here? Play and be part of the leaderboard!</span>


    </div>

</div>
<?php
include_once "../includes/footer.php";
?>

<script>
    $(document).on('click', '.delete-object', function () {
        var id = $(this).attr('delete-id');
        console.log(('this is what yu have chosen to delete', id))
        // if want to design confirm box, try look at boot box or sweet alert
        var confirm = window.confirm("Are you sure you want to delete this record?")
        if (confirm) {
            $.post('delete_leaderboard.php', {
                gameresult_id: id
            }, function (data) {
                location.reload();
            }).fail(function () {
                alert('unable to delete. please check code');
            })
        }
    })

</script>